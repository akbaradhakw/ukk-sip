<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Spatie\Permission\Models\Role;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Collection;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $navigationGroup = 'Management';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                TextInput::make('nis'),
                TextInput::make('phone')
            ->formatStateUsing(function ($state) {
                if (!$state) return null;

                // Jika sudah ada +62, kembalikan seperti semula
                if (str_starts_with($state, '+62')) {
                    return $state;
                }

                // Jika dimulai dengan 0, hapus 0 dan tambah +62
                if (str_starts_with($state, '0')) {
                    return '+62' . substr($state, 1);
                }

                // Jika tidak dimulai dengan 0 atau +62, tambah +62
                return '+62' . $state;
            })
            ->dehydrateStateUsing(function ($state) {
                if (!$state) return null;

                // Jika sudah ada +62, kembalikan seperti semula
                if (str_starts_with($state, '+62')) {
                    return $state;
                }

                // Jika dimulai dengan 0, hapus 0 dan tambah +62
                if (str_starts_with($state, '0')) {
                    return '+62' . substr($state, 1);
                }

                // Jika tidak dimulai dengan 0 atau +62, tambah +62
                return '+62' . $state;
            }),
                TextInput::make('address')
                    ->maxLength(500),
                FileUpload::make('photo')
                    ->label('Foto Profil')
                    ->image()                      // hanya terima image
                    ->maxSize(1024)                // max size 1MB (optional)
                    ->directory('foto-profil')    // simpan di folder storage/app/public/foto-profil
                    ->visibility('public')         // supaya bisa diakses publik
                    ->nullable(),                  // boleh kosong
                Toggle::make('internship_status')
                    ->label('Status PKL')
                    ->default(false)
                    ->inline()
                    ->required()
                    ->helperText('Tandai jika siswa sudah terverifikasi PKL'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('nis')->sortable()->searchable(),
                TextColumn::make('gender')
                    ->label('Gender')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                        default => 'Tidak Diketahui',
                    }),                
                TextColumn::make('phone')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('internship_status')
                    ->label('Status PKL')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Terverifikasi' : 'Belum Terverifikasi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('deleteSelected')
                    ->label('Hapus yang Belum PKL')
                    ->requiresConfirmation()
                    ->action(function (Collection $records) {
                        // Hanya ambil yang internship_status = false (belum PKL)
                        $recordsToDelete = $records->filter(function ($record) {
                            return !$record->internship_status;
                        });

                        $recordsToDelete->each->delete();
                    })
                    ->deselectRecordsAfterCompletion()
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
            ]);

            
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}

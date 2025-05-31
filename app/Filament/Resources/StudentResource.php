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
                    ->tel()
                    ->maxLength(15),
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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

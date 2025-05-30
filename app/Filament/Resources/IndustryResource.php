<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustryResource\Pages;
use App\Filament\Resources\IndustryResource\RelationManagers;
use App\Models\industry;
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

class IndustryResource extends Resource
{
    protected static ?string $model = industry::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';    
    protected static ?string $navigationGroup = 'Management';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('business_fields')
                    ->required()
                    ->maxLength(255),
                TextInput::make('address'),
                TextInput::make('phone')
                    ->tel()
                    ->maxLength(15),
                TextInput::make('email')
                    ->maxLength(500)
                    ->email(),
                TextInput::make('website')
                    ->maxLength(255)
                    ->url()
                    ->nullable(),
                FileUpload::make('logo')
                    ->label('logo industri')
                    ->image()                      // hanya terima image
                    ->maxSize(1024)                // max size 1MB (optional)
                    ->directory('foto-profil')    // simpan di folder storage/app/public/foto-profil
                    ->visibility('public')         // supaya bisa diakses publik
                    ->nullable(),                  // boleh kosong

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('business_fields')->sortable()->searchable(),
                TextColumn::make('address')->sortable()->searchable(),
                TextColumn::make('phone')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('website')->sortable()->searchable(),
                
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
            'index' => Pages\ListIndustries::route('/'),
            'create' => Pages\CreateIndustry::route('/create'),
            'edit' => Pages\EditIndustry::route('/{record}/edit'),
        ];
    }
}

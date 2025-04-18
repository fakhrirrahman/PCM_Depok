<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StrukturOrganisasiResource\Pages;
use App\Filament\Resources\StrukturOrganisasiResource\RelationManagers\ChildrenRelationManager;
use App\Models\StrukturOrganisasi;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class StrukturOrganisasiResource extends Resource
{
    protected static ?string $model = StrukturOrganisasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $pluralModelLabel = 'Struktur Organisasi';


    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
        ->emptyStateHeading('Belum ada struktur organisasi')
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama Anggota'),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->label('Jabatan'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('jabatan')->label('Jabatan'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStrukturOrganisasis::route('/'),
            'create' => Pages\CreateStrukturOrganisasi::route('/create'),
            'edit' => Pages\EditStrukturOrganisasi::route('/{record}/edit'),
        ];
    }
}

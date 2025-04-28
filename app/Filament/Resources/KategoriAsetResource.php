<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriAsetResource\Pages;
use App\Filament\Resources\KategoriAsetResource\RelationManagers;
use App\Models\KategoriAset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriAsetResource extends Resource
{
    protected static ?string $model = KategoriAset::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $pluralModelLabel = 'Kategori Aset';


    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Data';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('jenis')
                    ->required()
                    ->label('Jenis Aset'),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->label('Status Aset'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->emptyStateHeading('Belum ada kategori aset yang ditambahkan')
            ->columns([
                Tables\Columns\TextColumn::make('jenis')
                    ->sortable()
                    ->searchable()
                    ->label('Jenis Aset'),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->searchable()
                    ->label('Status Aset'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Tanggal Dibuat'),
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
            'index' => Pages\ListKategoriAsets::route('/'),
            'create' => Pages\CreateKategoriAset::route('/create'),
            'edit' => Pages\EditKategoriAset::route('/{record}/edit'),
        ];
    }
}

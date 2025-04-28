<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriResource\Pages;
use App\Filament\Resources\KategoriResource\RelationManagers;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $pluralModelLabel = 'Kategori Keuangan';


    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Data';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama Kategori'),
                Forms\Components\TextInput::make('jenis')
                    ->required()
                    ->label('Jenis Kategori'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->emptyStateHeading('Belum ada kategori keuangan yang ditambahkan')
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Kategori'),
                Tables\Columns\TextColumn::make('jenis')
                    ->sortable()
                    ->searchable()
                    ->label('Jenis Kategori'),
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
            'index' => Pages\ListKategoris::route('/'),
            'create' => Pages\CreateKategori::route('/create'),
            'edit' => Pages\EditKategori::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotulensiResource\Pages;
use App\Filament\Resources\NotulensiResource\RelationManagers;
use App\Models\Notulensi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NotulensiResource extends Resource
{
    protected static ?string $model = Notulensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $pluralModelLabel = 'Notulensi';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')->required()->placeholder('Masukkan judul notulensi'),
                Forms\Components\Textarea::make('notulensi')->required()->placeholder('Masukkan notulensi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Belum ada notulensi')
            ->columns([
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\TextColumn::make('notulensi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListNotulensis::route('/'),
            'create' => Pages\CreateNotulensi::route('/create'),
            'edit' => Pages\EditNotulensi::route('/{record}/edit'),
        ];
    }
}

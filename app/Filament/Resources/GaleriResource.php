<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralModelLabel = 'Galeri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make(Galeri::MEDIA_COLLECTION)
                    ->label('Unggah Gambar')
                    ->collection(Galeri::MEDIA_COLLECTION)
                    ->multiple()
                    ->required()
                    ->image()
                    ->maxSize(10240)
                    ->helperText('Upload gambar untuk galeri (maks 10MB).'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Split::make([
                    SpatieMediaLibraryImageColumn::make(Galeri::MEDIA_COLLECTION)
                        ->label('Gambar')
                        ->collection(Galeri::MEDIA_COLLECTION)
                        ->size(120)
                        ->extraImgAttributes(['class' => 'rounded-lg shadow-md object-cover'])
                        ->defaultImageUrl(asset('storage/default.png')),
                ])
            ])

            ->actions([
                EditAction::make()->label('Edit'),
                DeleteAction::make()->label('Hapus'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}

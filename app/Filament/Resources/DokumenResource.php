<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokumenResource\Pages;
use App\Filament\Resources\DokumenResource\RelationManagers;
use App\Models\Dokumen;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\FileColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class DokumenResource extends Resource
{
    protected static ?string $model = Dokumen::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document'; // Ikon clipboard dengan dokumen

    protected static ?string $pluralModelLabel = 'Dokumen';

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

    public static function form(Form $form): Form

    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul_dokumen')
                    ->required()
                    ->label('Nama Dokumen'),

                SpatieMediaLibraryFileUpload::make(Dokumen::MEDIA_COLLECTION)
                    ->collection(Dokumen::MEDIA_COLLECTION)
                    ->label('Dokumen File')
                    ->columnSpanFull()
                    ->reorderable()
                    ->downloadable()
                    ->preserveFilenames(), // Menggunakan nama asli file

                Forms\Components\Hidden::make('diupload_oleh')
                    ->default(auth()->id()),

                Forms\Components\Hidden::make('diupdate_oleh')
                    ->default(auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul_dokumen')
                    ->label('Nama Dokumen')
                    ->searchable()
                    ->sortable(),

                // Menampilkan file dengan tautan unduhan
                Tables\Columns\TextColumn::make('dokumen_file')
                    ->label('Dokumen File')
                    ->getStateUsing(function ($record) {
                        $media = $record->getFirstMedia(Dokumen::MEDIA_COLLECTION);
                        $fileName = $media ? $media->file_name : 'No file';
                        return $fileName;
                    }),
                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Diupload Oleh'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->date('d F Y H:i:s'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListDokumens::route('/'),
            'create' => Pages\CreateDokumen::route('/create'),
            'edit' => Pages\EditDokumen::route('/{record}/edit'),
        ];
    }
}

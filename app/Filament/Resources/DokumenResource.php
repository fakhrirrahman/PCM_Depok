<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokumenResource\Pages;
use App\Filament\Resources\DokumenResource\RelationManagers;
use App\Models\Dokumen;
use Filament\Forms;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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

                Forms\Components\FileUpload::make('file')
                    ->required()
                    ->label('Dokumen File')
                    ->disk('public') // Pastikan kamu menggunakan disk yang tepat di konfigurasi filesystem
                    ->directory('dokumen') // Tentukan folder untuk menyimpan file, misalnya 'dokumen'
                    ->image() // Jika hanya ingin menerima gambar, bisa gunakan `image()`
                    ->maxSize(10240) // Maksimum ukuran file 10 MB, sesuaikan sesuai kebutuhan
                    ->preserveFilenames(), // Agar nama file tetap dipertahankan

                Forms\Components\Hidden::make('diupload_oleh')
                    ->default(auth()->id()),

                Forms\Components\Hidden::make('diupdate_oleh')
                    ->default(now()),
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

                Tables\Columns\TextColumn::make('file')
                    ->label('Dokumen File'),
                Tables\Columns\TextColumn::make('creator.name'),


                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->date('d F Y H:i:s'),
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
            'index' => Pages\ListDokumens::route('/'),
            'create' => Pages\CreateDokumen::route('/create'),
            'edit' => Pages\EditDokumen::route('/{record}/edit'),
        ];
    }
}

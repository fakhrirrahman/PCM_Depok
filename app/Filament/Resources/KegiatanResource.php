<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kegiatan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Resources\KegiatanResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use PhpParser\Node\Stmt\Label;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $pluralModelLabel = 'Kegiatan';

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

    const STATUS_KEGIATAN = ['berjalan', 'selesai', 'dibatalkan'];

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('nama_kegiatan')
                        ->required(),

                    Forms\Components\Textarea::make('deskripsi')
                        ->required(),

                    Forms\Components\TextInput::make('lokasi')
                        ->required(),

                    Forms\Components\Select::make('anggotas')
                        ->label('Anggota')
                        ->relationship('anggota', 'nama')
                        ->multiple(),

                    Forms\Components\DatePicker::make('tanggal')
                        ->label('Tanggal')
                        ->required(),

                    SpatieMediaLibraryFileUpload::make(Kegiatan::MEDIA_COLLECTION)
                        ->collection(Kegiatan::MEDIA_COLLECTION)
                        ->label('Foto Kegiatan')
                        ->multiple()
                        ->maxFiles(5)
                        ->maxSize(1024)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                        ->downloadable()
                        ->columnSpan(1)
                        ->reorderable()
                        ->required(),


                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Belum ada kegiatan')
            ->columns([
                TextColumn::make('nama_kegiatan')->searchable(),
                TextColumn::make('deskripsi'),
                TextColumn::make('lokasi'),
                SpatieMediaLibraryImageColumn::make(Kegiatan::MEDIA_COLLECTION)
                    ->collection(Kegiatan::MEDIA_COLLECTION)
                    ->label('Gambar')
                    ->size(60)
                    ->defaultImageUrl(asset('storage/default.png')),
                TextColumn::make('anggota.nama')
                    ->label('Anggota')
                    ->badge()
                    ->separator(', '),
                TextColumn::make('tanggal')->date()->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus')
                        ->action(function (array $records) {
                            Kegiatan::destroy($records);
                            Notification::make()
                                ->title('Data berhasil dihapus.')
                                ->success()
                                ->send();
                        }),
                ])
                ->label('Aksi'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}

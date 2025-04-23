<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kegiatan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use App\Filament\Resources\KegiatanResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $pluralModelLabel = 'Kegiatan';

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('nama_kegiatan')
                        ->required(),

                        Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('lokasi')
                        ->required(),

                    Forms\Components\Select::make('anggotas')
                        ->label('Anggota')
                        ->relationship('anggota', 'nama')
                        ->placeholder('Pilih Anggota')
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
                        Hidden::make('created_by')
                            ->default(auth()->id())
                            ->visible(fn ($get, $livewire) => $livewire instanceof \App\Filament\Resources\KegiatanResource\Pages\CreateKegiatan),

                        Hidden::make('updated_by')
                            ->default(auth()->id())
                            ->visible(fn ($get, $livewire) => $livewire instanceof \App\Filament\Resources\KegiatanResource\Pages\EditKegiatan),

                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Belum ada kegiatan')
            ->columns([
                TextColumn::make('nama_kegiatan')
                    ->label('Nama Kegiatan')
                    ->searchable()
                    ->wrap(),
    
                    TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(100)  // Batasi 100 karakter di tabel
                    ->wrap(),
    
                TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->wrap()
                    ->tooltip(fn ($state) => $state),
    
                SpatieMediaLibraryImageColumn::make(Kegiatan::MEDIA_COLLECTION)
                    ->collection(Kegiatan::MEDIA_COLLECTION)
                    ->label('Gambar')
                    ->size(60)
                    ->defaultImageUrl(asset('storage/default.png')),
    
                TextColumn::make('anggota.nama')
                    ->label('Anggota Terlibat')
                    ->badge()
                    ->separator(', ')
                    ->tooltip('Daftar anggota yang terlibat'),
    
                TextColumn::make('tanggal')
                    ->label('Tanggal Kegiatan')
                    ->date('d M Y')
                    ->sortable()
                    ->tooltip('Tanggal pelaksanaan kegiatan'),
    
                TextColumn::make('created_by')
                    ->label('Dibuat Oleh')
                    ->getStateUsing(fn (Kegiatan $record) => $record->creator?->name ?? 'Tidak diketahui')
                    ->badge()
                    ->color('success'),
    
                TextColumn::make('updated_by')
                    ->label('Diperbarui Oleh')
                    ->getStateUsing(fn (Kegiatan $record) => $record->editor?->name ?? 'Tidak diketahui')
                    ->badge()
                    ->color('warning'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Lihat'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
                    ->modalButton('Ya, Hapus')
                    ->action(function (Kegiatan $record) {
                        $record->delete();
                        Notification::make()
                            ->title('Data berhasil dihapus.')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus')
                        ->action(function (Collection  $records) {
                            Kegiatan::destroy($records->pluck('id'));
                            Notification::make()
                                ->title('Data berhasil dihapus.')
                                ->success()
                                ->send();
                        }),
                ])->label('Aksi'),
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

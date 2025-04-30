<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Galeri;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Doctrine\DBAL\Schema\View;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\GaleriResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $pluralModelLabel = 'Galeri';
    
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make(Galeri::MEDIA_COLLECTION)
                    ->label('Unggah Gambar')
                    ->collection(Galeri::MEDIA_COLLECTION)
                    ->required()
                    ->image()
                    ->downloadable()
                    ->columnSpanFull()
                    ->maxSize(10240)
                    ->helperText('Upload gambar untuk galeri (maks 10MB).'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->emptyStateHeading('Belum ada galeri')
        ->columns([
            Tables\Columns\Layout\Grid::make(2)
                ->schema([
                    SpatieMediaLibraryImageColumn::make(Galeri::MEDIA_COLLECTION)
                        ->label('Gambar')
                        ->collection(Galeri::MEDIA_COLLECTION)
                        ->size(120)
                        ->extraImgAttributes([
                            'class' => 'rounded-xl shadow-lg object-cover aspect-square w-full h-auto',
                        ])
                        ->defaultImageUrl(asset('storage/default.png')),
                ])
                ->extraAttributes([
                    'class' => 'gap-6 p-4 bg-gray-900 rounded-xl',
                ]),

                TextColumn::make('created_at')
                ->label('Tanggal Dibuat')
                ->formatStateUsing(
                    fn($state) =>
                        \Carbon\Carbon::parse($state)->locale('id_ID')->diffForHumans()
                )
                ->sortable()
                ->extraAttributes([
                    'class' => 'text-gray-500',
                ])

        ])
        ->actions([
            Tables\Actions\ViewAction::make()
            ->label('Lihat')
            ->modalFooterActions([
                Tables\Actions\Action::make('close')
                    ->label('Tutup')
                    ->action(fn ($record, $livewire) => $livewire->closeModal()),
            ]),
            EditAction::make()->label('Edit'),
            Tables\Actions\DeleteAction::make()->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
                    ->modalButton('Ya, Hapus')
                    ->action(function (Galeri $record) {
                        $record->delete();
                        Notification::make()
                            ->title('Data berhasil dihapus.')
                            ->success()
                            ->send();
                    }),
            
                ])
                ->bulkActions([
                    BulkActionGroup::make([
                        DeleteBulkAction::make()
                            ->label('Hapus Terpilih')
                            ->modalHeading('Konfirmasi Hapus')
                            ->modalSubheading('Apakah Anda yakin ingin menghapus data yang dipilih?')
                            ->modalButton('Ya, Hapus')
                            ->successNotification(null) 
                            ->after(function () {
                                Notification::make()
                                    ->title('Data berhasil dihapus.')
                                    ->success()
                                    ->send();
                            }),
                    ])
                    ->label('Aksi Massal'),
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

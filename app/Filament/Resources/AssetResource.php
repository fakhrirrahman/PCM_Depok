<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Asset;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\KategoriAset;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Fieldset; 
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\AssetResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AssetResource\RelationManagers;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $pluralModelLabel = 'Aset';
    
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nama')
                ->label('Nama Aset')
                ->required()
                ->maxLength(255),

                Select::make('tipe')
                ->label('Tipe')
                ->options(fn () => KategoriAset::query()
                    ->select('jenis')
                    ->distinct()
                    ->pluck('jenis', 'jenis')
                )
                ->placeholder('Pilih Jenis Aset')
                ->required()
                ->reactive(),

            Textarea::make('alamat')
                ->label('Alamat')
                ->rows(3),

                Select::make('status')
                ->label('Status')
                ->placeholder('Pilih Status')
                ->options(function (callable $get) {
                    $jenis = $get('tipe');
                    if (!$jenis) {
                        return [];
                    }
            
                    return KategoriAset::query()
                        ->where('jenis', $jenis)
                        ->pluck('status', 'status'); // Perhatikan: pakai 'status', bukan 'id' jika kamu tidak butuh id-nya
                })
                ->required()
                ->reactive()
                ->disabled(fn (callable $get) => !$get('tipe')),
            

            SpatieMediaLibraryFileUpload::make(Asset::MEDIA_COLLECTION)
                ->label('Unggah Gambar')
                ->collection(Asset::MEDIA_COLLECTION)
                ->required()
                ->image()
                ->placeholder('Unggah gambar untuk galeri')
                ->downloadable()
                ->maxSize(10240)
                ->helperText('Upload gambar untuk galeri (maks 10MB).'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
           ->defaultSort('id', 'desc')
        ->emptyStateHeading('Belum ada aset')
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Aset')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tipe')
                    ->label('Jenis Aset')
                    ->searchable(),

                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),

                SpatieMediaLibraryImageColumn::make(Asset::MEDIA_COLLECTION)
                    ->collection(Asset::MEDIA_COLLECTION)
                    ->label('Gambar')
                    ->size(60),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)
                    ->translatedFormat('d F Y'))
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tipe')
                    ->label('Filter Jenis Aset')
                    ->options(
                        fn () => KategoriAset::query()
                            ->select('jenis')
                            ->distinct()
                            ->pluck('jenis', 'jenis')
                    )
                    ->placeholder('Semua Jenis'),
            
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options(
                        fn () => KategoriAset::query()
                            ->select('status')
                            ->distinct()
                            ->pluck('status', 'status')
                    )
                    ->placeholder('Semua Status'),
            ])
            ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make()->label('Hapus')
            ->modalHeading('Konfirmasi Hapus')
            ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
            ->modalButton('Ya, Hapus')
            ->action(function (Asset $record) {
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }
}

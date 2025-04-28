<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Kategori;
use App\Models\Keuangan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\KeuanganResource\Pages;

class KeuanganResource extends Resource
{
    protected static ?string $model = Keuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $pluralModelLabel = 'Keuangan';

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

    public static function getRelations(): array
    {
        return [];
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('tanggal_transaksi')
                    ->required(),
                    Select::make('tipe')
                    ->label('Tipe')
                    ->options(fn () => Kategori::query()
                        ->select('jenis')
                        ->distinct()
                        ->pluck('jenis', 'jenis')
                    )
                    ->placeholder('Pilih tipe')
                    ->required()
                    ->reactive(), 
                Select::make('kategori')
                    ->label('Kategori')
                    ->placeholder('Pilih kategori')
                    ->options(function (callable $get) {
                        $tipe = $get('tipe');
                
                        if (!$tipe) {
                            return [];
                        }
                
                        return Kategori::query()
                            ->where('jenis', $tipe)
                            ->pluck('nama', 'id');
                    })
                    ->required()
                    ->reactive()
                    ->disabled(fn (callable $get) => !$get('tipe')),
                TextInput::make('jumlah')
                    ->numeric()
                    ->required(),
                TextInput::make('saldo_awal')
                    ->numeric()
                    ->nullable(),
                TextInput::make('saldo_akhir')
                    ->numeric()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultSort('id', 'desc')
        ->emptyStateHeading('Belum ada data keuangan')
            ->columns([
                TextColumn::make('tanggal_transaksi')
                    ->date()->sortable(),
                TextColumn::make('tipe'),
                TextColumn::make('kategori')
                    ->searchable(),
                TextColumn::make('jumlah')
                    ->sortable()
                    ->money('IDR'),
                TextColumn::make('saldo_awal')
                    ->sortable()
                    ->money('IDR'),
                TextColumn::make('saldo_akhir')
                    ->sortable()
                    ->money('IDR'),
            ])
            ->filters([
                SelectFilter::make('tipe')
                ->placeholder('semua')
                    ->options([
                        'saldo' => 'Saldo',
                        'Pemasukan' => 'Pemasukan',
                        'Pengeluaran' => 'Pengeluaran',
                    ])
                    ->label('Tipe Transaksi'),

                SelectFilter::make('kategori')
                ->placeholder('Semua')
                    ->options(fn() => Keuangan::query()
                        ->select('kategori')
                        ->distinct()
                        ->pluck('kategori', 'kategori')
                        ->toArray())
                    ->label('Kategori'),

                \Filament\Tables\Filters\Filter::make('tanggal_transaksi')
                    ->form([
                        Forms\Components\DatePicker::make('from')->label('Dari'),
                        Forms\Components\DatePicker::make('until')->label('Sampai'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q) => $q->whereDate('tanggal_transaksi', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->whereDate('tanggal_transaksi', '<=', $data['until']));
                    }),
            ])
            ->searchPlaceholder('Cari data keuangan...')
            ->actions([
                EditAction::make(),
                DeleteAction::make()
                    ->modalHeading('Konfirmasi Hapus')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
                    ->modalButton('Ya, Hapus')
                    ->action(function (Keuangan $record) {
                        $record->delete();
                        Notification::make()
                            ->title('Data berhasil dihapus.')
                            ->success()
                            ->send();
                    })
                    ->Label('Hapus')
            ])
            ->bulkActions([
                DeleteBulkAction::make()->modalHeading('Konfirmasi Hapus')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus data yang dipilih?')
                    ->modalButton('Ya, Hapus')
                    ->action(function (array $records) {
                        Keuangan::destroy($records);
                        Notification::make()
                            ->title('Data berhasil dihapus.')
                            ->success()
                            ->send();
                    })
                    ->Label('Hapus Terpilih')
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeuangans::route('/'),
            'create' => Pages\CreateKeuangan::route('/create'),
            'edit' => Pages\EditKeuangan::route('/{record}/edit'),
        ];
    }
}

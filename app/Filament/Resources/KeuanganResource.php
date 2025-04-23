<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeuanganResource\Pages;
use App\Models\Keuangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Notifications\Notification;

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
                Forms\Components\DatePicker::make('tanggal_transaksi')
                    ->required(),
                Forms\Components\Select::make('tipe')
                    ->options([
                        'saldo' => 'Saldo',
                        'pemasukan' => 'Pemasukan',
                        'pengeluaran' => 'Pengeluaran',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('kategori')
                    ->required(),
                Forms\Components\TextInput::make('jumlah')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('saldo_awal')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('saldo_akhir')
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
                        'pemasukan' => 'Pemasukan',
                        'pengeluaran' => 'Pengeluaran',
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

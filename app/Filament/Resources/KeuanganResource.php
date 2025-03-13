<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeuanganResource\Pages;
use App\Filament\Resources\KeuanganResource\RelationManagers;
use App\Models\Keuangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\NumberInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;


class KeuanganResource extends Resource
{
    protected static ?string $model = Keuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $pluralModelLabel = 'Keuangan';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('tanggal_transaksi')->required(),
                Select::make('jenis_transaksi')
                    ->options([
                        'Pemasukan' => 'Pemasukan',
                        'Pengeluaran' => 'Pengeluaran',
                    ])
                    ->required()

                    ->placeholder('Pilih jenis transaksi'),
                TextInput::make('keterangan')->required()->placeholder('Masukkan keterangan'),
                TextInput::make('jumlah')->required()->placeholder('Masukkan jumlah uang')
                    ->type('number'),

                Select::make('kategori')
                    ->options([
                        'Pengembangan' => 'Pengembangan',
                        'Penggajian' => 'Penggajian',
                        'Pengadaan' => 'Pengadaan',
                    ])
                    ->required()
                    ->placeholder('Pilih kategori'),
                TextInput::make('saldo')->required()->placeholder('Masukkan sisa saldo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('tanggal_transaksi')->sortable()->searchable(),
                TextColumn::make('jenis_transaksi')->searchable(),
                TextColumn::make('keterangan')->searchable(),
                TextColumn::make('jumlah')->searchable(),
                TextColumn::make('kategori')->searchable(),
                TextColumn::make('saldo')->sortable()->searchable(),
            ])
            ->filters([
                Filter::make('tanggal_transaksi')
                    ->form([
                        DatePicker::make('from')->label('Dari'),
                        DatePicker::make('to')->label('Ke'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['from'] ?? null, fn($q, $date) => $q->whereDate('tanggal_transaksi', '>=', $date))
                            ->when($data['to'] ?? null, fn($q, $date) => $q->whereDate('tanggal_transaksi', '<=', $date));
                    }),
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
            'index' => Pages\ListKeuangans::route('/'),
            'create' => Pages\CreateKeuangan::route('/create'),
            'edit' => Pages\EditKeuangan::route('/{record}/edit'),
        ];
    }
}

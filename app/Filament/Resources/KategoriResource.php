<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Kategori;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KategoriResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KategoriResource\RelationManagers;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $pluralModelLabel = 'Kategori Keuangan';


    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Data';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama Kategori'),
                Forms\Components\TextInput::make('jenis')
                    ->required()
                    ->label('Jenis Kategori'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->emptyStateHeading('Belum ada kategori keuangan yang ditambahkan')
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Kategori'),
                Tables\Columns\TextColumn::make('jenis')
                    ->sortable()
                    ->searchable()
                    ->label('Jenis Kategori'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Tanggal Dibuat')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)
                    ->translatedFormat('d F Y')),
            ])
            ->searchPlaceholder('Cari kategori...')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->label('Hapus')
                ->modalHeading('Konfirmasi Hapus')
                ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
                ->modalButton('Ya, Hapus')
                ->action(function (Kategori $record) {
                    $record->delete();
                    Notification::make()
                        ->title('Data berhasil dihapus.')
                        ->success()
                        ->send();
                }),
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
            'index' => Pages\ListKategoris::route('/'),
            'create' => Pages\CreateKategori::route('/create'),
            'edit' => Pages\EditKategori::route('/{record}/edit'),
        ];
    }
}

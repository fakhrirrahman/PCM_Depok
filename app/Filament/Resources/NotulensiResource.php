<?php

namespace App\Filament\Resources;

use Dom\Text;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Notulensi;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\NotulensiResource\Pages;


class NotulensiResource extends Resource
{
    protected static ?string $model = Notulensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $pluralModelLabel = 'Notulensi';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    TextInput::make('judul')->required()->placeholder('Masukkan judul notulensi'),
                    Textarea::make('notulensi')->required()->placeholder('Masukkan notulensi'),
                    DatePicker::make('created_at')
                    ->label('Tanggal Notulensi')
                    ->required()
                    ->displayFormat('d/m/Y') 
                    ->native(false)
                    ->placeholder('dd/mm/yyyy')
                    ->closeOnDateSelection(),
                    TextInput::make('kehadiran')->required()->placeholder('Anggota Yang Hadir'),            
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
               ->defaultSort('id', 'desc')
                ->emptyStateHeading('Belum ada notulensi')
                ->columns([
                    Tables\Columns\TextColumn::make('judul')->searchable(),
                    Tables\Columns\TextColumn::make('notulensi')
                        ->label('Notulensi')
                        ->limit(50) 
                        ->wrap() 
                        ->searchable(),
                    Tables\Columns\TextColumn::make('kehadiran')
                        ->label('Kehadiran Anggota')
                        ->wrap() 
                        ->searchable(),
                    Tables\Columns\TextColumn::make('created_at')
                        ->label('Tanggal Notulensi')
                        ->formatStateUsing(function ($state) {
                            return $state->translatedFormat('d F Y');
                        })
                        ->sortable()
                        ->searchable(),

                ])
            ->filters([
                Tables\Filters\Filter::make('Tanggal')
                    ->form([
                        DatePicker::make('from')
                            ->label('Dari tanggal')
                            ->native(false),
                        DatePicker::make('until')
                            ->label('Sampai tanggal')
                            ->native(false),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn ($q) => $q->whereDate('created_at', '>=', $data['from']))
                            ->when($data['until'], fn ($q) => $q->whereDate('created_at', '<=', $data['until']));
                    }),
            ])
            ->searchPlaceholder('Cari notulensi...')
            ->actions([
                // Tables\Actions\ViewAction::make()->label('Lihat'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->label('Hapus')
                ->modalHeading('Konfirmasi Hapus')
                ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
                ->modalButton('Ya, Hapus')
                ->action(function (Notulensi $record) {
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
            'index' => Pages\ListNotulensis::route('/'),
            'create' => Pages\CreateNotulensi::route('/create'),
            'edit' => Pages\EditNotulensi::route('/{record}/edit'),
        ];
    }
}

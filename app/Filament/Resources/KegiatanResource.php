<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\TextColumn;

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
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kegiatan')->required(),
                Forms\Components\Textarea::make('deskripsi')->required(),
                Forms\Components\TextInput::make('lokasi')->required(),
                Forms\Components\DatePicker::make('tanggal_mulai')->required(),
                Forms\Components\DatePicker::make('tanggal_selesai')->required(),
                Forms\Components\Select::make('status_kegiatan')
                    ->options([
                        'berjalan' => 'Berjalan',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_kegiatan')->sortable()->searchable(),
                TextColumn::make('deskripsi'),
                TextColumn::make('lokasi'),
                TextColumn::make('tanggal_mulai')->date(),
                TextColumn::make('tanggal_selesai')->date(),
                TextColumn::make('status_kegiatan')
                    ->label('Status')
                    ->formatStateUsing(function (?string $state): HtmlString {
                        return match ($state) {
                            'berjalan' => new HtmlString('<span class="text-blue-500 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-4.2-2.52A1 1 0 0 0 9 9.72v4.56a1 1 0 0 0 1.552.872l4.2-2.52a1 1 0 0 0 0-1.728z"/></svg> Berjalan</span>'),
                            'selesai' => new HtmlString('<span class="text-green-500 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Selesai</span>'),
                            'dibatalkan' => new HtmlString('<span class="text-red-500 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg> Dibatalkan</span>'),
                            default => new HtmlString('<span class="text-gray-500">Tidak Diketahui</span>'),
                        };
                    })
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([])
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

<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Notulensi;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
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
                Forms\Components\TextInput::make('judul')->required()->placeholder('Masukkan judul notulensi'),
                Forms\Components\Textarea::make('notulensi')->required()->placeholder('Masukkan notulensi'),
                DatePicker::make('created_at')
                ->label('Tanggal Notulensi')
                ->required()
                ->displayFormat('d/m/Y') 
                ->native(false)
                ->placeholder('dd/mm/yyyy')
                ->closeOnDateSelection() 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Belum ada notulensi')
            ->columns([
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\TextColumn::make('notulensi')
                    ->label('Notulensi')
                    ->limit(50) 
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->label('Hapus')
                    ->action(function (Notulensi $record) {
                        $record->delete();
                        Notification::make()
                            ->title('Notulensi berhasil dihapus')
                            ->success()
                            ->send();
                    }), 
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function (array $records) {
                            Notulensi::destroy($records);
                            Notification::make()
                                ->title('Notulensi berhasil dihapus')
                                ->success()
                                ->send();
                        })
                        ->label('Hapus')
                ])
                ->label('Aksi')
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

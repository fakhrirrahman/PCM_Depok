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
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NotulensiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NotulensiResource\RelationManagers;

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
                Tables\Columns\TextColumn::make('notulensi'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Notulensi')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
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

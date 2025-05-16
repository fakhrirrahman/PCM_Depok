<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ranting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\RantingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RantingResource\RelationManagers;

class RantingResource extends Resource
{
    protected static ?string $model = Ranting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Ranting')
                    ->placeholder('Masukkan nama ranting')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Ranting')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
           ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->label('Hapus')
                ->modalHeading('Konfirmasi Hapus')
                ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
                ->modalButton('Ya, Hapus')
                ->action(function (Ranting $record) {
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
            'index' => Pages\ListRantings::route('/'),
            'create' => Pages\CreateRanting::route('/create'),
            'edit' => Pages\EditRanting::route('/{record}/edit'),
        ];
    }
}

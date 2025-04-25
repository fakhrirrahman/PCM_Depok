<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\VisiMisi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VisiMisiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VisiMisiResource\RelationManagers;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $pluralModelLabel = 'Visi Misi';


    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('visi')
                    ->label('Visi')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('misi')
                    ->label('Misi')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Belum ada visi misi')
            ->columns([
                Tables\Columns\TextColumn::make('visi')
                    ->label('Visi')
                    ->limit(100) 
                    ->wrap() 
                    ->searchable(),

                Tables\Columns\TextColumn::make('misi')
                    ->label('Misi')
                    ->limit(100) 
                    ->wrap(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime()
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return $state->translatedFormat('d F Y');
                    }),
            ])
        ->searchPlaceholder('Cari visi misi...')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Lihat'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus visi misi ini?')
                    ->modalButton('Hapus')
                    ->color('danger')
                    ->action(function (VisiMisi $record) {
                        $record->delete();
                        Notification::make()
                            ->title('Visi Misi dihapus')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus')
                        ->modalHeading('Konfirmasi Hapus')
                        ->modalSubheading('Apakah Anda yakin ingin menghapus visi misi ini?')
                        ->modalButton('Hapus')
                        ->color('danger')
                        ->action(function (array $records) {
                            VisiMisi::destroy($records);
                            Notification::make()
                                ->title('Visi Misi dihapus')
                                ->success()
                                ->send();
                        }),
                ])->label('Aksi')
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
            'index' => Pages\ListVisiMisis::route('/'),
            'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}

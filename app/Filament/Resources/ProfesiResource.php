<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Profesi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\ProfesiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProfesiResource\RelationManagers;

class ProfesiResource extends Resource
{
    protected static ?string $model = Profesi::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $pluralModelLabel = 'Profesi Anggota';


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
                    ->label('Nama Profesi')
                    ->placeholder('Masukkan nama profesi apabila anda menambah profesi baru')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->emptyStateHeading('Belum ada profesi')
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at') 
                ->label('Tanggal Dibuat')
                ->formatStateUsing(fn ($state) => Carbon::parse($state)
                ->translatedFormat('d F Y'))
                ->sortable()
               
            ])
            ->searchPlaceholder('Cari profesi...')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->label('Hapus')
                ->modalHeading('Konfirmasi Hapus')
                ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
                ->modalButton('Ya, Hapus')
                ->action(function (Profesi $record) {
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
            'index' => Pages\ListProfesis::route('/'),
            'create' => Pages\CreateProfesi::route('/create'),
            'edit' => Pages\EditProfesi::route('/{record}/edit'),
        ];
    }
}

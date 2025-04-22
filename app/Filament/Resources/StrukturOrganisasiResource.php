<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Models\StrukturOrganisasi;
use Filament\Notifications\Notification;
use App\Filament\Resources\StrukturOrganisasiResource\Pages;
use App\Filament\Resources\StrukturOrganisasiResource\RelationManagers\ChildrenRelationManager;
use PhpParser\Node\Stmt\Label;

class StrukturOrganisasiResource extends Resource
{
    protected static ?string $model = StrukturOrganisasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $pluralModelLabel = 'Struktur Organisasi';


    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama Anggota'),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->label('Jabatan'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
        ->emptyStateHeading('Belum ada struktur organisasi')
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('jabatan')->label('Jabatan'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus anggota ini?')
                    ->modalButton('Hapus')
                    ->color('danger')
                    ->action(function (StrukturOrganisasi $record) {
                        $record->delete();
                        Notification::make()
                            ->title('Anggota dihapus')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus anggota ini?')
                    ->modalButton('Hapus')
                    ->color('danger')
                    ->action(function (array $records) {
                        StrukturOrganisasi::destroy($records);
                        Notification::make()
                            ->title('Anggota dihapus')
                            ->success()
                            ->send();
                    })
                    ->label('Hapus terpilih'),
                    
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStrukturOrganisasis::route('/'),
            'create' => Pages\CreateStrukturOrganisasi::route('/create'),
            'edit' => Pages\EditStrukturOrganisasi::route('/{record}/edit'),
        ];
    }
}

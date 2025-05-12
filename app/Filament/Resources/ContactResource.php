<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\ContactResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContactResource\RelationManagers;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left';

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

    protected static ?string $pluralModelLabel = 'Pesan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required(),

                Forms\Components\TextInput::make('subject')
                    ->label('Subject')
                    ->required(),

                Forms\Components\Textarea::make('message')
                    ->label('Message')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->defaultSort('id', 'desc')
        ->emptyStateHeading('Belum ada pesan')
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('subject')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('message')
                    ->searchable()
                    ->sortable(),
            ])
            ->searchPlaceholder('Cari pesan...')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()->label('Hapus')
                ->modalHeading('Konfirmasi Hapus')
                ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
                ->modalButton('Ya, Hapus')
                ->action(function (Contact $record) {
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}

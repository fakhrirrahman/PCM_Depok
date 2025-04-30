<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\UsersResource\Pages;

class UsersResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $pluralModelLabel = 'Pengguna';

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Role';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nama')
                    ->maxLength(255),
                    Forms\Components\Select::make('roles')
                    ->label('Role')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->placeholder('Pilih role')
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->label('Email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->label('Password')
                    ->confirmed()
                    ->maxLength(255)
                    ->dehydrated(fn ($state) => (bool) $state)
                    ->visibleOn('create'),
                Forms\Components\TextInput::make('password_confirmation')
                    ->password()
                    ->maxLength(255)
                    ->label('Konfirmasi Password')
                    ->dehydrated(false)
                    ->visibleOn('create'),
            ])->columns
            (2)

            ->columns([
                'sm' => 2,
            ]);
        }

    public static function table(Table $table): Table
    {
        return $table
        ->emptyStateHeading('Belum ada pengguna')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Dibuat pada')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return $state->translatedFormat('d F Y');
                    })
                    ->searchable(),
            ])
            ->searchPlaceholder('Cari pengguna...')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()->label('Edit'),
                Tables\Actions\DeleteAction::make()->label('Hapus')
                    ->action(function (array $data): void {
                        User::destroy($data['record']->id);
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUsers::route('/create'),
            'edit' => Pages\EditUsers::route('/{record}/edit'),
        ];
    }
}

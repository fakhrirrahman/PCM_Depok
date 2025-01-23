<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaResource\Pages;
use App\Filament\Resources\AnggotaResource\RelationManagers;
use App\Models\Anggota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;


class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $pluralModelLabel = 'Anggota';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Organisasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('telepon')->required(),
                Textarea::make('alamat')->required(),
                DatePicker::make('tanggal_lahir')->required(),
                Select::make('jenis_kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])->required(),
                Select::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Nonaktif' => 'Nonaktif',
                    ])
                    ->default('Aktif')
                    ->placeholder('Pilih status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable(),
                Tables\Columns\TextColumn::make('telepon')->sortable(),
                Tables\Columns\TextColumn::make('alamat')->sortable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')->sortable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->formatStateUsing(function ($state) {
                        return ['L' => 'Laki-laki', 'P' => 'Perempuan'][$state] ?? $state;
                    })->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }
}

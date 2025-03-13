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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;

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
                TextInput::make('nama')->required()->placeholder('Masukkan nama lengkap'),
                TextInput::make('tempat_lahir')->required()->placeholder('Masukkan tempat lahir'),
                DatePicker::make('tanggal_lahir')->required()->label('Tanggal Lahir'),
                TextInput::make('nbm')->required()->unique()->placeholder('Masukkan NBM'),
                Select::make('cabang')
                    ->options([
                        'Depok' => 'Depok',
                    ])
                    ->searchable()
                    ->required()
                    ->placeholder('Pilih cabang'),
                TextInput::make('pdm')->required()->placeholder('Masukkan PDM'),
                TextInput::make('pwm')->required()->placeholder('Masukkan PWM'),
                TextInput::make('alamat')->required()->placeholder('Masukkan alamat lengkap'),
                TextInput::make('kabupaten_tinggal')->required()->placeholder('Masukkan kabupaten'),
                TextInput::make('provinsi_tinggal')->required()->placeholder('Masukkan provinsi'),
                TextInput::make('kelurahan')->required()->placeholder('Masukkan kelurahan'),
                TextInput::make('profesi')->required()->placeholder('Masukkan profesi'),
                TextInput::make('no_hp')->tel()->required()->placeholder('Masukkan No. HP'),
                TextInput::make('email')->email()->required()->unique()->placeholder('Masukkan email'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('nbm')->sortable()->searchable()->label('NBM'),
                TextColumn::make('cabang')->sortable()->searchable(),
                TextColumn::make('pdm')->sortable(),
                TextColumn::make('pwm')->sortable(),
                TextColumn::make('profesi')->sortable(),
                TextColumn::make('no_hp')->sortable(),
                TextColumn::make('email')->sortable(),
            ])
            ->filters([
                Filter::make('cabang')
                    ->query(fn(Builder $query, array $data): Builder => $query->where('cabang', $data['cabang'] ?? null)),
                Filter::make('profesi')
                    ->query(fn(Builder $query, array $data): Builder => $query->where('profesi', $data['profesi'] ?? null)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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

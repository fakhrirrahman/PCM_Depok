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
use Filament\Forms\Components\FileUpload;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AnggotaImport;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Storage;
use App\Exports\AnggotaExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
                TextInput::make('nama')->placeholder('Masukkan nama lengkap'),
                TextInput::make('tempat_lahir')->placeholder('Masukkan tempat lahir'),
                DatePicker::make('tanggal_lahir')->label('Tanggal Lahir'),
                TextInput::make('nbm_depan')->placeholder('Masukkan NBM depan'),
                TextInput::make('nbm')->placeholder('Masukkan NBM'),
                TextInput::make('tahun_pembuatan')->placeholder('Masukkan tahun pembuatan'),
                Select::make('cabang')
                    ->options([
                        'Depok' => 'Depok',
                    ])
                    ->searchable()
                    ->placeholder('Pilih cabang'),
                TextInput::make('pdm')->placeholder('Masukkan PDM'),
                TextInput::make('pwm')->placeholder('Masukkan PWM'),
                TextInput::make('alamat')->placeholder('Masukkan alamat lengkap'),
                TextInput::make('kabupaten_tinggal')->placeholder('Masukkan kabupaten'),
                TextInput::make('provinsi_tinggal')->placeholder('Masukkan provinsi'),
                TextInput::make('kelurahan')->placeholder('Masukkan kelurahan'),
                TextInput::make('profesi')->placeholder('Masukkan profesi'),
                TextInput::make('no_hp')->tel()->placeholder('Masukkan No. HP'),
                TextInput::make('email')->email()->placeholder('Masukkan email'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('tempat_lahir')->sortable()->searchable(),
                TextColumn::make('tanggal_lahir')->sortable()->searchable(),
                TextColumn::make('provinsi_tinggal')->sortable()->searchable(),
                TextColumn::make('nbm_depan')->sortable()->searchable(),
                TextColumn::make('nbm')->sortable()->searchable(),
                TextColumn::make('tahun_pembuatan')->sortable()->searchable(),
                TextColumn::make('cabang')->sortable()->searchable(),
                TextColumn::make('pdm')->sortable(),
                TextColumn::make('pwm')->sortable(),
                TextColumn::make('alamat')->sortable(),
                TextColumn::make('kabupaten_tinggal')->sortable(),
                TextColumn::make('provinsi_tinggal')->sortable(),
                TextColumn::make('kelurahan')->sortable(),
                TextColumn::make('profesi')->sortable(),
                TextColumn::make('no_hp')->sortable(),
                TextColumn::make('email')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Action::make('import')
                    ->label('Import Anggota')
                    ->icon('heroicon-m-arrow-up-tray')
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih File Excel')
                            ->acceptedFileTypes([
                                'application/vnd.ms-excel',
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                'text/csv',
                            ])
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        $filePath = storage_path('app/public/' . $data['file']);
                        Excel::import(new AnggotaImport, $filePath);
                    })
                    ->modalHeading('Import Data Anggota')
                    ->modalButton('Import'),

                Action::make('export')
                    ->label('Export Anggota')
                    ->icon('heroicon-m-arrow-down-tray')
                    ->action(function () {
                        return Excel::download(new AnggotaExport, 'anggota.xlsx');
                    }),
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

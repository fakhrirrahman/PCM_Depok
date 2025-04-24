<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Anggota;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Exports\AnggotaExport;
use App\Imports\AnggotaImport;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\AnggotaResource\Pages;


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
                TextInput::make('nama')->placeholder('Masukkan nama lengkap')->required(),
                TextInput::make('tempat_lahir')->placeholder('Masukkan tempat lahir')->required(),
                DatePicker::make('tanggal_lahir')->label('Tanggal Lahir')->required(),
                TextInput::make('nbm_depan')->placeholder('Masukkan NBM depan')->required()->label('NBM Depan'),
                TextInput::make('nbm')->placeholder('Masukkan NBM')->required()->label('NBM'),
                TextInput::make('tahun_pembuatan')->placeholder('Masukkan tahun pembuatan')->required(),
                Hidden::make('cabang')
                    ->default('Depok')->required(),
                Hidden::make('pdm')
                    ->default('Kab Sleman')->required(),
                Hidden::make('pwm')
                    ->default('Daerah Istimewa Yogyakarta')->required(),
                TextInput::make('alamat')->placeholder('Masukkan alamat lengkap')->required(),
                TextInput::make('kabupaten_tinggal')->placeholder('Masukkan kabupaten')->required(),
                TextInput::make('provinsi_tinggal')->placeholder('Masukkan provinsi')->required(),
                TextInput::make('kelurahan')->placeholder('Masukkan kelurahan')->required(),
                Select::make('profesi')
                ->label('Profesi')
                ->options([
                    'mahasiswa' => 'Mahasiswa',
                    'guru' => 'Guru',
                    'dosen' => 'Dosen',
                    'dokter' => 'Dokter',
                    'perawat' => 'Perawat',
                    'pengusaha' => 'Pengusaha',
                    'petani' => 'Petani',
                    'nelayan' => 'Nelayan',
                    'buruh' => 'Buruh',
                    'pengangguran' => 'Belum/Tidak Bekerja',
                    'lainnya' => 'Lainnya',
                ])
                ->placeholder('Pilih profesi')
                ->searchable()
                ->required(),
                TextInput::make('no_hp')->tel()->placeholder('Masukkan No. HP')->required(),
                TextInput::make('email')->email()->placeholder('Masukkan email'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
        ->emptyStateHeading('Belum ada anggota')
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('tempat_lahir')->sortable()->searchable(),
                TextColumn::make('tanggal_lahir')->sortable()->searchable(),
                TextColumn::make('provinsi_tinggal')->sortable()->searchable(),
                TextColumn::make('nbm_depan')->sortable()->searchable()->label('NBM Depan'),
                TextColumn::make('nbm')->sortable()->searchable()->label('NBM'),
                TextColumn::make('tahun_pembuatan')->sortable()->searchable(),
                TextColumn::make('cabang')->sortable()->searchable(),
                TextColumn::make('pdm')->sortable()->label('PDM'),
                TextColumn::make('pwm')->sortable()->label('PWM'),
                TextColumn::make('alamat')->sortable(),
                TextColumn::make('kabupaten_tinggal')->sortable(),
                TextColumn::make('provinsi_tinggal')->sortable(),
                TextColumn::make('kelurahan')->sortable(),
                TextColumn::make('profesi')->sortable(),
                TextColumn::make('no_hp')->sortable(),
                TextColumn::make('email')->sortable(),
            ])
            ->searchPlaceholder('Cari anggota...')
            ->filters([
                Tables\Filters\SelectFilter::make('profesi')
                ->label('Filter Profesi')
                ->placeholder('Semua')
                ->options(function () {
                        return Anggota::query()
                            ->whereNotNull('profesi')
                            ->where('profesi', '!=', '')
                            ->distinct()
                            ->orderBy('profesi')
                            ->pluck('profesi')
                            ->filter() 
                            ->mapWithKeys(fn ($value) => [$value => $value]);
                }),
            ])
            
            ->actions([
                Tables\Actions\EditAction::make()->label('Edit'),
                Tables\Actions\DeleteAction::make()->label('Hapus')
                    ->modalHeading('Konfirmasi Hapus')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
                    ->modalButton('Ya, Hapus')
                    ->action(function (Anggota $record) {
                        $record->delete();
                        Notification::make()
                            ->title('Data berhasil dihapus.')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Terpilih')
                        ->modalHeading('Konfirmasi Hapus')
                        ->modalSubheading('Apakah Anda yakin ingin menghapus data yang dipilih?')
                        ->modalButton('Ya, Hapus'),
                ])
                    ->Label('Aksi Massal')
            ])
            ->headerActions([
                Action::make('import')
                    ->label('Impor Anggota')
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
                    ->label('Ekspor Anggota')
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

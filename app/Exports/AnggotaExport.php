<?php

namespace App\Exports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnggotaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Anggota::select(
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'nbm_depan',
            'nbm',
            'cabang',
            'pdm',
            'pwm',
            'alamat',
            'kabupaten_tinggal',
            'provinsi_tinggal',
            'kelurahan',
            'profesi',
            'no_hp',
            'email'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'NBM Depan',
            'NBM',
            'Cabang',
            'PDM',
            'PWM',
            'Alamat',
            'Kabupaten Tinggal',
            'Provinsi Tinggal',
            'Kelurahan',
            'Profesi',
            'No HP',
            'Email'
        ];
    }
}

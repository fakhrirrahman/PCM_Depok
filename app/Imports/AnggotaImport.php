<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Anggota;

class AnggotaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (Anggota::where('nbm', $row['nbm'])->exists()) {
            return null;
        }

        return new Anggota([
            'nama'             => $row['nama'] ?? null,
            'tempat_lahir'     => $row['tempat_lahir'] ?? null,
            'tanggal_lahir'    => $row['tanggal_lahir'] ?? null,
            'nbm'              => $row['nbm'] ?? null,
            'nbm_depan'        => $row['nbm_depan'] ?? null,
            'cabang'           => $row['cabang'] ?? null,
            'pdm'              => $row['pdm'] ?? null,
            'pwm'              => $row['pwm'] ?? null,
            'alamat'           => $row['alamat'] ?? null,
            'kabupaten_tinggal' => $row['kabupaten_tinggal'] ?? null,
            'provinsi_tinggal' => $row['propinsi_tinggal'] ?? null,
            'kelurahan'        => $row['kelurahan'] ?? null,
            'profesi'          => $row['profesi'] ?? null,
            'no_hp'            => $row['nohp'] ?? null,
            'email'            => $row['email'] ?? null,
        ]);
    }
}

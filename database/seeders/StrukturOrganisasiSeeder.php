<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Str;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StrukturOrganisasi::insert([
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Pak Eshan', 'jabatan' => 'Ketua'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Pak Ahmad Maftuhin', 'jabatan' => 'Sekretaris'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Pak Ibnu Setyawan', 'jabatan' => 'Wakil Sekretaris'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Pak Suyudi', 'jabatan' => 'Bendahara'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Pak Dr. Suwadi', 'jabatan' => 'Wakil Ketua Bidang Didesmen dan Ekonomi'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Pak Ahmad Afandi', 'jabatan' => 'Wakil Ketua Bidang Kader dan Tablig'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Pak Sumiran', 'jabatan' => 'Wakil Ketua Bidang Wakaf dan Pemberdayaan Masyarakat'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => "Pak Mu'alim Hawari", 'jabatan' => 'Wakil Ketua Bidang Sosial dan Kesehatan'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Pak Suyidna', 'jabatan' => 'Wakil Ketua Bidang Majelis Pustaka dan Lingkungan Hidup'],
        ]);
    }
}

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
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'H. Muhammad Ichsan, S.E., M.M', 'jabatan' => 'Ketua'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Ahmad Maftuhin, S.H.I', 'jabatan' => 'Sekretaris'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Ibnu Setyawan', 'jabatan' => 'Wakil Sekretaris'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Suyudi, S.E', 'jabatan' => 'Bendahara'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Dr. H. Suwadi, M.Ag., M.Pd', 'jabatan' => 'Wakil Ketua Bidang Didesmen dan Ekonomi'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Achmad Afandi, S.Ag., M.Pd', 'jabatan' => 'Wakil Ketua Bidang Kader dan Tablig'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Drs. H. Muhammad Jumiran, M.Pd.I', 'jabatan' => 'Wakil Ketua Bidang Wakaf dan Pemberdayaan Masyarakat'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => "dr. Muallim Hawary, M.M.R", 'jabatan' => 'Wakil Ketua Bidang Sosial dan Kesehatan'],
            ['id' => strtolower((string) Str::ulid()), 'nama' => 'Suyitno M.Pd', 'jabatan' => 'Wakil Ketua Bidang Majelis Pustaka dan Lingkungan Hidup'],
        ]);
    }
}

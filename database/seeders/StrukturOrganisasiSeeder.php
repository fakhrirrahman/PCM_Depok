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
            [ 'nama' => 'H. Muhammad Ichsan, S.E., M.M', 'jabatan' => 'Ketua'],
            [ 'nama' => 'Ahmad Maftuhin, S.H.I', 'jabatan' => 'Sekretaris'],
            [ 'nama' => 'Ibnu Setyawan', 'jabatan' => 'Wakil Sekretaris'],
            [ 'nama' => 'Suyudi, S.E', 'jabatan' => 'Bendahara'],
            [ 'nama' => 'Dr. H. Suwadi, M.Ag., M.Pd', 'jabatan' => 'Wakil Ketua Bidang Didesmen dan Ekonomi'],
            [ 'nama' => 'Achmad Afandi, S.Ag., M.Pd', 'jabatan' => 'Wakil Ketua Bidang Kader dan Tablig'],
            [ 'nama' => 'Drs. H. Muhammad Jumiran, M.Pd.I', 'jabatan' => 'Wakil Ketua Bidang Wakaf dan Pemberdayaan Masyarakat'],
            [ 'nama' => "dr. Muallim Hawary, M.M.R", 'jabatan' => 'Wakil Ketua Bidang Sosial dan Kesehatan'],
            [ 'nama' => 'Suyitno M.Pd', 'jabatan' => 'Wakil Ketua Bidang Majelis Pustaka dan Lingkungan Hidup'],
        ]);
    }
}

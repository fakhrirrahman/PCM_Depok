<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(StrukturOrganisasiSeeder::class);
        $this->call(KeuanganSeeder::class);
        $this->call(KegiatanSeeder::class);
        $this->call(GaleriSeeder::class);
        $this->call(NotulensiSeeder::class);
        $this->call(PesanSeeder::class);
        $this->call(VisiMisiSeeder::class);
        $this->call(ProfesiSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(KategoriAsetSeeder::class);
    }
}

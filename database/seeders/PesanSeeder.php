<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'Ahmad Fauzi',
            'email' => 'ahmad.fauzi@example.com',
            'subject' => 'Permohonan Informasi',
            'message' => 'Assalamu’alaikum, saya ingin menanyakan informasi lebih lanjut mengenai program kerja PCM Depok Sleman. Terima kasih.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Contact::create([
            'name' => 'Siti Rahmawati',
            'email' => 'rahmawati.siti@example.com',
            'subject' => 'Usulan Kegiatan',
            'message' => 'Saya ingin mengusulkan kegiatan pengajian rutin untuk ibu-ibu Aisyiyah di wilayah Depok Barat.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

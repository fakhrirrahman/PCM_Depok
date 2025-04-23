<?php

namespace Database\Seeders;

use App\Models\Notulensi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NotulensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Galat pertama: Notulensi PCM Depok Sleman
        $notulensi1 = Notulensi::create([
            'judul' => 'Notulensi Rapat PCM Depok Sleman',
            'notulensi' => 'Rapat koordinasi mengenai kegiatan PCM Depok Sleman yang akan dilaksanakan bulan depan. Pembahasan meliputi distribusi tugas, pembagian anggaran, dan penentuan jadwal kegiatan.',
            'created_at' => Carbon::now()->subDays(5), // Tanggal 5 hari yang lalu
        ]);

        // Galat kedua: Notulensi PCM Depok Sleman
        $notulensi2 = Notulensi::create([
            'judul' => 'Notulensi Rapat Evaluasi Kegiatan PCM Depok Sleman',
            'notulensi' => 'Evaluasi kegiatan PCM Depok Sleman yang baru saja selesai. Diskusi mengenai pelaksanaan kegiatan, tantangan yang dihadapi, serta solusi untuk kegiatan mendatang.',
            'created_at' => Carbon::now()->subDays(10), // Tanggal 10 hari yang lalu
        ]);

        // Galat ketiga: Notulensi PCM Depok Sleman
        $notulensi3 = Notulensi::create([
            'judul' => 'Notulensi Rapat Persiapan Kegiatan Tahunan PCM Depok Sleman',
            'notulensi' => 'Rapat persiapan untuk kegiatan tahunan yang akan diadakan oleh PCM Depok Sleman. Pembahasan meliputi persiapan tempat, peserta, serta materi yang akan disampaikan.',
            'created_at' => Carbon::now()->subDays(15), // Tanggal 15 hari yang lalu
        ]);
    }
}

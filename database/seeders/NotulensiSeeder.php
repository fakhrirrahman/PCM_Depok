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
        $notulensi1 = Notulensi::create([
            'judul' => 'Notulensi Rapat PCM Depok Sleman',
            'notulensi' => 'Rapat koordinasi mengenai kegiatan PCM Depok Sleman yang akan dilaksanakan bulan depan. Pembahasan meliputi distribusi tugas, pembagian anggaran, dan penentuan jadwal kegiatan.',
            'kehadiran'=> 'Budi, Siti, Joko',
            'created_at' => Carbon::now()->subDays(5), 
        ]);

        $notulensi2 = Notulensi::create([
            'judul' => 'Notulensi Rapat Evaluasi Kegiatan PCM Depok Sleman',
            'notulensi' => 'Evaluasi kegiatan PCM Depok Sleman yang baru saja selesai. Diskusi mengenai pelaksanaan kegiatan, tantangan yang dihadapi, serta solusi untuk kegiatan mendatang.',
            'kehadiran'=> 'Budi, Siti, Joko',
            'created_at' => Carbon::now()->subDays(10), 
        ]);

        $notulensi3 = Notulensi::create([
            'judul' => 'Notulensi Rapat Persiapan Kegiatan Tahunan PCM Depok Sleman',
            'notulensi' => 'Rapat persiapan untuk kegiatan tahunan yang akan diadakan oleh PCM Depok Sleman. Pembahasan meliputi persiapan tempat, peserta, serta materi yang akan disampaikan.',
            'kehadiran'=> 'Budi, Siti, Joko',
            'created_at' => Carbon::now()->subDays(15), 
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\VisiMisi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::create([
            'visi' => 'Menjadi organisasi yang unggul dalam membina umat dan mencetak kader-kader Muhammadiyah yang berintegritas dan berdedikasi tinggi di wilayah Depok Sleman.',
            'misi' => "- Menanamkan nilai-nilai keislaman dan kemuhammadiyahan secara konsisten.\n- Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan kader.\n- Menjalin kerja sama dengan berbagai pihak untuk memperkuat peran organisasi dalam masyarakat.\n- Mendorong kegiatan sosial dan dakwah yang relevan dengan kebutuhan umat.\n- Menyediakan layanan kesehatan, pendidikan, dan sosial berbasis nilai-nilai Islam.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

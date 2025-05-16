<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ranting;

class RantingSeeder extends Seeder
{
    public function run(): void
    {
        $rantings = [
            ['nama' => 'PRM Condongcatur Timur'],
            ['nama' => 'PRM Condongcatur Barat'],
            ['nama' => 'PRM Perumnas Condongcatur'],
            ['nama' => 'PRM Caturtunggal Timur'],
            ['nama' => 'PRM Caturtunggal Tengah'],
            ['nama' => 'PRM Caturtunggal Barat'],
            ['nama' => 'PRM Deresan'],
            ['nama' => 'PRM Maguwoharjo Utara'],
            ['nama' => 'PRM Maguwoharjo Selatan'],
            ['nama' => 'PRM UGM'],
            ['nama' => 'PRM UNY'],
            ['nama' => 'PRA Condongcatur Timur'],
            ['nama' => 'PRA Condongcatur Barat'],
            ['nama' => 'PRA Perumnas Condongcatur'],
            ['nama' => 'PRA Caturtunggal Timur'],
            ['nama' => 'PRA Caturtunggal Tengah'],
            ['nama' => 'PRA Caturtunggal Barat'],
            ['nama' => 'PRA Deresan'],
            ['nama' => 'PRA Maguwoharjo'],
        ];

        Ranting::insert($rantings);
    }
}

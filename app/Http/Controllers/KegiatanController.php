<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with('anggota')->paginate(3); // Ambil data kegiatan

        return view('index', compact('kegiatans')); // Tampilkan data kegiatan
    }
    public function kegiatan()
    {
        $kegiatans = Kegiatan::with('anggota')->latest()->get(); // Ambil data kegiatan

        return view('kegiatan', compact('kegiatans'));
    }
}

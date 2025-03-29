<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with('anggota')->latest()->take(3)->get();
        return view('pages.index', compact('kegiatans'));
    }
    public function kegiatan()
    {
        $kegiatans = Kegiatan::with('anggota')->paginate(9);

        return view('pages.kegiatan', compact('kegiatans'));
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::with('anggota')->find($id);

        return view('pages.pageKegiatan', compact('kegiatan'));
    }
}

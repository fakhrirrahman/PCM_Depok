<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\VisiMisi;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::query();
        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
        $anggota = $query->paginate(10)->appends(['search' => $request->search]);
        return view('pages.anggota', compact('anggota'));
    }

    public function about()
    {
        $anggota = Anggota::whereNotNull('nama')->orderBy('id', 'desc')->take(10)->get();
        $visimisi = VisiMisi::all();
        return view('pages.tentang-kami', compact('anggota', 'visimisi'));
    }
}

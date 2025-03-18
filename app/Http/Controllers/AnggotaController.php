<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::query();
        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
        $anggota = $query->paginate(10)->appends(['search' => $request->search]);
        return view('anggota', compact('anggota'));
    }

    public function about()
    {
        $anggota = Anggota::paginate(10);
        return view('tentang-kami', compact('anggota'));
    }
}

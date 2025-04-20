<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kegiatans = Kegiatan::with('anggota')->latest()->take(3)->get();
        
        $data['kegiatans'] = $kegiatans;
        $data['user'] = $user;
        return view('pages.index', $data);
    }
    public function kegiatan(Request $request)
    {
        $query = Kegiatan::query();
        if ($request->has('search')) {
            $query->where('nama_kegiatan', 'like', '%' . $request->search . '%');
        }
        $kegiatans = $query->with('anggota')->latest()->paginate(10)->appends(['search' => $request->search]);
        return view('pages.kegiatan', compact('kegiatans'));
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::with(['anggota', 'media'])->findOrFail($id);
        $mediaUrls = $kegiatan->media->pluck('url')->toArray();
        $kegiatan->mediaUrls = $mediaUrls;
        
        $semuaKegiatan = Kegiatan::with('media')
            ->where('id', '!=', $id)
            ->latest()
            ->get();
            
        return view('pages.pageKegiatan', [
            'kegiatan' => $kegiatan,
            'semuaKegiatan' => $semuaKegiatan
        ]);
    }
}

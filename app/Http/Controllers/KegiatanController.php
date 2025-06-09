<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Carbon\Carbon;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::whereDate('tanggal', '=' ,'2025-01-19')
            ->orWhereDate('tanggal', '>', Carbon::now())
            ->latest()
            ->get();
        return view('pages.index', compact('kegiatans'));
    }
    public function kegiatan(Request $request)
    {
        $query = Kegiatan::query();
        if ($request->has('search')) {
            $query->where('nama_kegiatan', 'like', '%' . $request->search . '%');
        }
        $kegiatans = $query->latest()->paginate(10)->appends(['search' => $request->search]);
        return view('pages.kegiatan', compact('kegiatans'));
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::with('media')->findOrFail($id);
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

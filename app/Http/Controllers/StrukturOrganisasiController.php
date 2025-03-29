<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $StrukturOrganisasi = StrukturOrganisasi::all();
        return view('pages.struktur-organisasi', compact('StrukturOrganisasi'));
    }
}

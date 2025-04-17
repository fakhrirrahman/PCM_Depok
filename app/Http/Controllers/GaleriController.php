<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{

    public function index()
    {
        $galeri = Galeri::get();
        return view('pages.galeri', compact('galeri'));
    }
}

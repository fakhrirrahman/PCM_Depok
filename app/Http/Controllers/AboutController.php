<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $visimisi = VisiMisi::all(); 
        return view('pages.tentang-kami', compact('visimisi'));
    }
}

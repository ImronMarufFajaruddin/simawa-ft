<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingBeritaController extends Controller
{
    public function index()
    {
        return view('landings-page.berita.index');
    }
}

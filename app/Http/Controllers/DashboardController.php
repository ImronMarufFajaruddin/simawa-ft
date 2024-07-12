<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin\Lpj;
use App\Models\Admin\Berita;
use App\Models\Admin\Galeri;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use App\Models\Admin\Kegiatan;
use App\Models\Admin\Proposal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('superadmin-only', $user)) {
            $userCount = User::count();
            $instansiCount = Instansi::count();
            $beritaCount = Berita::count();
            $lpjCount = Lpj::count();
            $proposalCount = Proposal::count();
            $kegiatanCount = Kegiatan::count();
            $galeriCount = Galeri::count();
        } elseif (Gate::allows('admin-only', $user)) {
            $userCount = 1;
            $instansiCount = $user->instansi ? 1 : 0;
            $beritaCount = Berita::where('user_id', $user->id)->count();
            $lpjCount = Lpj::where('user_id', $user->id)->count();
            $proposalCount = Proposal::where('user_id', $user->id)->count();
            $kegiatanCount = Kegiatan::where('user_id', $user->id)->count();
            $galeriCount = Galeri::where('user_id', $user->id)->count();
        } else {
            // Izin akses untuk non-admin diatur di sini
        }

        return view('admin.index', compact('userCount', 'instansiCount', 'beritaCount', 'lpjCount', 'proposalCount', 'kegiatanCount', 'user', 'galeriCount'));
    }
}

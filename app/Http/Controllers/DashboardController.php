<?php

namespace App\Http\Controllers;

use App\Models\Admin\Instansi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        // $user = User::where('role', 'admin')->count();
        $userCount = User::count();
        $instansiCount = Instansi::count();
        // $beritaCount = User::count();
        // $laporanCount = User::count();
        // $proposalCount = User::count()
        return view('admin.index', compact('userCount', 'instansiCount'));
    }
}

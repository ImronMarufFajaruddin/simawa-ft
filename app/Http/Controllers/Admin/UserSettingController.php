<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Instansi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserSettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataInstansi = Instansi::where('user_id', $user->id)->get();
        return view('admin.user-setting.index', compact('dataInstansi'));
    }
}

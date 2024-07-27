<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataInstansi = Instansi::where('user_id', $user->id)->get();
        return view('admin.user-setting.index', compact('dataInstansi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_resmi' => 'required|string|max:255',
            'nama_singkatan' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'instagram' => 'nullable|string|max:255',
            'website_link' => 'nullable|string|max:255',
            'sejarah' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            // Cari instansi berdasarkan ID
            $instansi = Instansi::findOrFail($id);

            // Simpan data yang diperbarui
            $instansi->nama_resmi = $request->nama_resmi;
            $instansi->nama_singkatan = $request->nama_singkatan;
            $instansi->no_telp = $request->no_telp;
            $instansi->instagram = $request->instagram;
            $instansi->website_link = $request->website_link;
            $instansi->sejarah = $request->sejarah;

            // Simpan perubahan
            $instansi->save();

            // Update email di tabel user
            $user = $instansi->user;
            $user->email = $request->email;
            $user->save();

            DB::commit();
            Session::flash('success', 'Data profil instansi berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Data profil instansi gagal diperbarui');
        }

        return redirect()->route('profile.index');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $instansi = $user->instansi;

        if ($instansi && $request->hasFile('logo')) {
            $logoLama = $instansi->logo;

            if ($logoLama) {
                DeleteFile::delete('instansi/logo/' . $logoLama);
            }

            $username = $user->username; // Mengambil username pengguna yang sedang login
            $file_logo = $request->file('logo');
            $file_url = UploadFile::upload('instansi/logo', $file_logo, $username);
            $instansi->logo = basename($file_url);

            $instansi->save();

            return redirect()->back()->with('success', 'Logo berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui logo. Pastikan Anda telah memilih file yang valid.');
    }
}

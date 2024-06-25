<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use App\Models\Admin\Anggota;
use App\Models\Admin\Instansi;
use App\Models\Admin\LevelJabatan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class AnggotaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $instansi = Instansi::where('user_id', $user->id)->first();

        if (Gate::allows('superadmin-only')) {
            $dataAnggota = Anggota::all();
            $dataLevelJabatan = LevelJabatan::all();
            $dataInstansi = Instansi::all();
        } else {
            if ($instansi) {
                $dataAnggota = Anggota::where('instansi_id', $instansi->id)->get();
                $dataLevelJabatan = LevelJabatan::where('instansi_id', $instansi->id)->get();
            } else {
                $dataAnggota = collect();
                $dataLevelJabatan = collect();
            }
            $dataInstansi = collect([$instansi]);
        }

        $dataUser = User::all();
        return view('admin.anggota.index', compact('dataAnggota', 'dataLevelJabatan', 'dataInstansi', 'dataUser'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'level_jabatan_id' => 'required|exists:level_jabatan,id',
            'nama' => 'required',
            'nim' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $instansi = Instansi::where('user_id', Auth::id())->first();

            if (!$instansi) {
                throw new \Exception('Anda Tidak Memiliki Instansi.');
            }

            if ($request->hasFile('foto')) {
                $folderPath = 'instansi/anggota/' . $instansi->nama_singkatan;
                $file_url = UploadFile::upload($folderPath, $request->file('foto'));
                $data['foto'] = $folderPath . '/' . basename($file_url);
            }

            $dataAnggota = new Anggota();
            $dataAnggota->level_jabatan_id = $data['level_jabatan_id'];
            $dataAnggota->instansi_id = $instansi->id;
            $dataAnggota->nama = $data['nama'];
            $dataAnggota->nim = $data['nim'];
            $dataAnggota->foto = $data['foto'] ?? null;

            $dataAnggota->save();
            DB::commit();

            Session::flash('success', 'Data Anggota Berhasil Ditambahkan');
            return redirect()->route('data-anggota.index');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', 'Data Anggota Gagal Ditambahkan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    public function edit($id)
    {
        $dataAnggota = Anggota::findOrFail($id);
        $dataLevelJabatan = LevelJabatan::all();
        $dataInstansi = Instansi::where('user_id', Auth::id())->first();

        return view('admin.anggota.edit', compact('dataAnggota', 'dataLevelJabatan', 'dataInstansi'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'level_jabatan_id' => 'required|exists:level_jabatan,id',
            'nama' => 'required',
            'nim' => 'numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $dataAnggota = Anggota::findOrFail($id);
            $instansi = Instansi::where('user_id', Auth::id())->first();

            if (!$instansi) {
                throw new \Exception('Anda Tidak Memiliki Instansi.');
            }

            if ($request->hasFile('foto')) {
                $folderPath = 'instansi/anggota/' . $instansi->nama_singkatan;
                $file_url = UploadFile::upload($folderPath, $request->file('foto'));
                $data['foto'] = $folderPath . '/' . basename($file_url);
            }

            $dataAnggota->level_jabatan_id = $data['level_jabatan_id'];
            $dataAnggota->instansi_id = $instansi->id;
            $dataAnggota->nama = $data['nama'];
            $dataAnggota->nim = $data['nim'];
            if (isset($data['foto'])) {
                $dataAnggota->foto = $data['foto'];
            }

            $dataAnggota->save();
            DB::commit();

            Session::flash('success', 'Data Anggota Berhasil Diperbarui');
            return redirect()->route('data-anggota.index');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', 'Data Anggota Gagal Diperbarui: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $dataAnggota = Anggota::findOrFail($id);
            $dataAnggota->delete();
            Session::flash('success', 'Data Anggota Berhasil Dihapus');
            return redirect()->route('data-anggota.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Data Anggota Gagal Dihapus: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}

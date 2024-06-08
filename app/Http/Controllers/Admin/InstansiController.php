<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriInstansi;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InstansiController extends Controller
{
    public function index()
    {
        $dataInstansi = Instansi::with('kategoriInstansi')->get();
        $dataKategoriInstansi = KategoriInstansi::all();
        return view('admin.instansi.index', compact('dataInstansi', 'dataKategoriInstansi'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_instansi_id' => 'required|exists:kategori_instansi,id',
            'nama_resmi' => 'required|unique:instansi,nama_resmi',
            'nama_singkatan' => 'required|unique:instansi,nama_singkatan',
            'logo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'no_telp' => 'required|numeric',
            'instagram' => 'required|url',
            'sejarah' => 'required',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('logo')) {
                $file_url = UploadFile::upload('instansi/logo', $request->file('logo'));
                $data['logo'] = basename($file_url);
            }

            $dataInstansi = new Instansi();
            $dataInstansi->kategori_instansi_id = $data['kategori_instansi_id'];
            $dataInstansi->nama_resmi = $data['nama_resmi'];
            $dataInstansi->nama_singkatan = $data['nama_singkatan'];
            $dataInstansi->logo = $data['logo'];
            $dataInstansi->no_telp = $data['no_telp'];
            $dataInstansi->instagram = $data['instagram'];
            $dataInstansi->sejarah = $data['sejarah'];
            $dataInstansi->save();

            DB::commit();

            Session::flash('success', 'Data Berhasil Disimpan');
            return redirect()->route('data-instansi.index');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', $e->getMessage('Data Gagal Disimpan'));
            return redirect()->route('data-instansi.index');
        }
    }

    public function edit($id)
    {
        $dataInstansi = Instansi::find($id);
        $dataKategoriInstansi = KategoriInstansi::all();
        return response()->json(['dataInstansi' => $dataInstansi, 'dataKategoriInstansi' => $dataKategoriInstansi], 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kategori_instansi_id' => 'required|exists:kategori_instansi,id',
            'nama_resmi' => 'required|unique:instansi,nama_resmi,' . $id,
            'nama_singkatan' => 'required|unique:instansi,nama_singkatan,' . $id,
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'no_telp' => 'required|numeric',
            'instagram' => 'required|url',
            'sejarah' => 'required',
        ]);

        $instansi = Instansi::findOrFail($id);
        $logoLama = $instansi->logo;

        try {
            DB::beginTransaction();

            $instansi->kategori_instansi_id = $data['kategori_instansi_id'];
            $instansi->nama_resmi = $data['nama_resmi'];
            $instansi->nama_singkatan = $data['nama_singkatan'];
            $instansi->no_telp = $data['no_telp'];
            $instansi->instagram = $data['instagram'];
            $instansi->sejarah = $data['sejarah'];

            if ($request->hasFile('logo')) {
                if ($logoLama) {
                    DeleteFile::delete('instansi/logo/' . $logoLama);
                }

                $file_logo = $request->file('logo');
                $file_url = UploadFile::upload('instansi/logo', $file_logo);
                $instansi->logo = basename($file_url);
            }

            $instansi->save();

            DB::commit();
            return redirect()->route('data-instansi.index')->with('success', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $instansi = Instansi::findOrFail($id);
            // Hapus file logo jika ada
            if ($instansi->logo) {
                DeleteFile::delete('instansi/logo/' . $instansi->logo);
            }

            $instansi->delete();

            Session::flash('success', 'Berhasil Menghapus Data');
            return redirect()->route('data-instansi.index');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage('Data Gagal Dihapus'));
            return redirect()->route('data-instansi.index');
        }
    }
}

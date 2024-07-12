<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\KategoriInstansi;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InstansiController extends Controller
{
    public function index()
    {
        $dataInstansi = Instansi::with('kategoriInstansi')->get();
        $dataUser = User::all();
        $dataKategoriInstansi = KategoriInstansi::all();
        return view('admin.instansi.index', compact('dataInstansi', 'dataKategoriInstansi', 'dataUser'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'kategori_instansi_id' => 'required|exists:kategori_instansi,id',
                'user_id' => 'required|exists:users,id',
                'nama_resmi' => 'required|unique:instansi,nama_resmi',
                'nama_singkatan' => 'required|unique:instansi,nama_singkatan',
                'logo' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'no_telp' => 'required|numeric',
                'instagram' => 'required|url',
                'website_link' => 'nullable|url',
                'sejarah' => 'required',
            ],
            [
                'logo.mimes' => 'File harus berformat PNG, JPG, atau JPEG',
                'logo.max' => 'File melebihi batas ukuran 2 MB',
                'no_telp.numeric' => 'No. Telp harus berupa angka',
                'no_telp.required' => 'No. Telp harus diisi',
                'instagram.required' => 'Instagram harus diisi',
                'instagram.url' => 'Instagram harus berupa link URL',
                'website_link.url' => 'Website harus berupa link URL',
                'sejarah.required' => 'Sejarah harus diisi',
                'user_id.required' => 'User harus diisi',
                'user_id.exists' => 'User tidak ditemukan',
                'kategori_instansi_id.required' => 'Kategori Instansi harus diisi',
                'kategori_instansi_id.exists' => 'Kategori Instansi tidak ditemukan',
                'nama_resmi.required' => 'Nama resmi harus diisi',
                'nama_resmi.unique' => 'Nama resmi sudah ada',
                'nama_singkatan.required' => 'Nama singkatan harus diisi',
                'nama_singkatan.unique' => 'Nama singkatan sudah ada',
                'logo.max' => 'File melebihi batas ukuran 2 MB',
            ]
        );

        try {
            DB::beginTransaction();

            if ($request->hasFile('logo')) {
                $file_url = UploadFile::upload('instansi/logo', $request->file('logo'));
                $data['logo'] = basename($file_url);
            }

            $dataInstansi = new Instansi();
            $dataInstansi->kategori_instansi_id = $data['kategori_instansi_id'];
            $dataInstansi->user_id = $data['user_id'];
            $dataInstansi->nama_resmi = $data['nama_resmi'];
            $dataInstansi->nama_singkatan = $data['nama_singkatan'];
            $dataInstansi->logo = $data['logo'];
            $dataInstansi->no_telp = $data['no_telp'];
            $dataInstansi->instagram = $data['instagram'];
            $dataInstansi->website_link = $data['website_link'];
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
        $data = $request->validate(
            [
                'kategori_instansi_id' => 'required|exists:kategori_instansi,id',
                'nama_resmi' => 'required|unique:instansi,nama_resmi,' . $id,
                'nama_singkatan' => 'required|unique:instansi,nama_singkatan,' . $id,
                'logo' => 'required|mimes:png,jpg,jpeg|max:2048',
                'no_telp' => 'required|numeric',
                'instagram' => 'required|url',
                'website_link' => 'required|url',
                'sejarah' => 'required',
            ],
            [
                'logo.mimes' => 'File harus berformat PNG, JPG, atau JPEG',
                'logo.max' => 'File melebihi batas ukuran 2 MB',
                'no_telp.numeric' => 'No. Telp harus berupa angka',
                'no_telp.required' => 'No. Telp harus diisi',
                'instagram.required' => 'Instagram harus diisi',
                'instagram.url' => 'Instagram harus berupa link URL',
                'website_link.url' => 'Website harus berupa link URL',
                'sejarah.required' => 'Sejarah harus diisi',
                'user_id.required' => 'User harus diisi',
                'user_id.exists' => 'User tidak ditemukan',
                'kategori_instansi_id.required' => 'Kategori Instansi harus diisi',
                'kategori_instansi_id.exists' => 'Kategori Instansi tidak ditemukan',
                'nama_resmi.required' => 'Nama resmi harus diisi',
                'nama_resmi.unique' => 'Nama resmi sudah ada',
                'nama_singkatan.required' => 'Nama singkatan harus diisi',
                'nama_singkatan.unique' => 'Nama singkatan sudah ada',
            ]
        );

        $instansi = Instansi::findOrFail($id);
        $logoLama = $instansi->logo;

        try {
            DB::beginTransaction();

            $instansi->kategori_instansi_id = $data['kategori_instansi_id'];
            $instansi->nama_resmi = $data['nama_resmi'];
            $instansi->nama_singkatan = $data['nama_singkatan'];
            $instansi->no_telp = $data['no_telp'];
            $instansi->instagram = $data['instagram'];
            $instansi->website_link = $data['website_link'];
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

    public function detail($id)
    {
        $dataInstansi = Instansi::find($id);
        return view('admin.instansi.detail', compact('dataInstansi'));
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

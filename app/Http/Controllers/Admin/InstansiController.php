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
            ]
        );

        try {
            DB::beginTransaction();

            $dataInstansi = new Instansi();
            $dataInstansi->kategori_instansi_id = $data['kategori_instansi_id'];
            $dataInstansi->user_id = $data['user_id'];
            $dataInstansi->nama_resmi = $data['nama_resmi'];
            $dataInstansi->nama_singkatan = $data['nama_singkatan'];
            $dataInstansi->no_telp = $data['no_telp'];
            $dataInstansi->instagram = $data['instagram'];
            $dataInstansi->website_link = $data['website_link'];
            $dataInstansi->sejarah = $data['sejarah'];

            if ($request->hasFile('logo')) {
                $file_url = UploadFile::upload('instansi/logo', $request->file('logo'), Auth::user()->username);
                $dataInstansi->logo = basename($file_url);
            }

            $dataInstansi->save();
            DB::commit();

            Session::flash('success', 'Data Berhasil Disimpan');
            return redirect()->route('data-instansi.index');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', 'Data Gagal Disimpan: ' . $e->getMessage());
            return redirect()->route('data-instansi.index');
        }
    }

    public function edit($id)
    {
        $dataInstansi = Instansi::findOrFail($id);
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
                'logo' => 'sometimes|nullable|mimes:png,jpg,jpeg|max:2048',
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

            // Update data instansi
            $instansi->kategori_instansi_id = $data['kategori_instansi_id'];
            $instansi->nama_resmi = $data['nama_resmi'];
            $instansi->nama_singkatan = $data['nama_singkatan'];
            $instansi->no_telp = $data['no_telp'];
            $instansi->instagram = $data['instagram'];
            $instansi->website_link = $data['website_link'];
            $instansi->sejarah = $data['sejarah'];

            // Jika ada logo baru diunggah
            if ($request->hasFile('logo')) {
                if ($logoLama) {
                    DeleteFile::delete('instansi/logo/' . $logoLama);
                }

                $file_url = UploadFile::upload('instansi/logo', $request->file('logo'), Auth::user()->username);
                $instansi->logo = basename($file_url);
            }

            // Simpan data instansi yang telah diperbarui
            $instansi->save();

            DB::commit();
            return redirect()->route('data-instansi.index')->with('success', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Data Gagal Diupdate: ' . $e->getMessage());
        }
    }

    public function detail($id)
    {
        $dataInstansi = Instansi::findOrFail($id);
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
            Session::flash('error', 'Data Gagal Dihapus: ' . $e->getMessage());
            return redirect()->route('data-instansi.index');
        }
    }
}

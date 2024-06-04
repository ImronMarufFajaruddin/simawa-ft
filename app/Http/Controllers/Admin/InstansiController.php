<?php

namespace App\Http\Controllers\Admin;

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
        // dd($dataInstansi);
        return view('admin.instansi.index', compact('dataInstansi', 'dataKategoriInstansi'));
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'kategori_instansi_id' => 'required|exists:kategori_instansi,id',
                'nama_resmi' => 'required|unique:instansi,nama_resmi',
                'nama_singkatan' => 'required|unique:instansi,nama_singkatan',
                'logo' => 'required|mimes:png,jpg,jpeg|max:2048',
                'no_telp' => 'required|numeric',
                'instagram' => 'required|url',
                'sejarah' => 'required',
            ],
            [
                'kategori_instansi_id.required' => 'Kategori Instansi Tidak Boleh Kosong',
                'nama_resmi.required' => 'Nama Instansi Tidak Boleh Kosong',
                'nama_resmi.unique' => 'Nama Instansi Sudah Ada',
                'nama_singkatan.required' => 'Singkatan Instansi Tidak Boleh Kosong',
                'nama_singkatan.unique' => 'Singkatan Instansi Sudah Ada',
                'logo.required' => 'Logo Instansi Tidak Boleh Kosong',
                'logo.mimes' => 'Logo Instansi Harus Berupa PNG, JPG, JPEG',
                'logo.max' => 'Logo Instansi Maksimal 2 MB',
            ]
        );

        try {
            DB::beginTransaction();

            if (request()->file('logo')) {
                $file_logo = request()->file('logo');
                $file_extention =  $file_logo->getClientOriginalExtension();
                $file_name = date('Ymdhis') . '.' . $file_extention;
                $file_logo->storeAs('public/instansi/logo', $file_name);
                $data['logo'] = $file_name;
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
        }
        return redirect()->route('data-instansi.index');
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

        try {
            $dataInstansi = Instansi::findOrFail($id);

            // Update data instansi
            $dataInstansi->kategori_instansi_id = $data['kategori_instansi_id'];
            $dataInstansi->nama_resmi = $data['nama_resmi'];
            $dataInstansi->nama_singkatan = $data['nama_singkatan'];
            $dataInstansi->logo = $data['logo'] ?? $dataInstansi->logo;;
            $dataInstansi->no_telp = $data['no_telp'];
            $dataInstansi->instagram = $data['instagram'];
            $dataInstansi->sejarah = $data['sejarah'];

            if (request()->hasFile('logo')) {
                $file_logo = request()->file('logo');
                $file_extention =  $file_logo->getClientOriginalExtension();
                $file_name = date('Ymdhis') . '.' . $file_extention;
                $file_logo->storeAs('public/instansi/logo', $file_name);
                $data['logo'] = $file_name;
            }

            $dataInstansi->save();

            return redirect()->route('data-instansi.index')->with('success', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage('Data gagal diupdate'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $instansi = Instansi::findOrFail($id);

            // Hapus file logo jika ada
            if ($instansi->logo && Storage::exists('public/instansi/logo/' . $instansi->logo)) {
                Storage::delete('public/instansi/logo/' . $instansi->logo);
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

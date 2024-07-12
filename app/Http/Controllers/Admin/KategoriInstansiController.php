<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriInstansi;
use Illuminate\Support\Facades\Session;

class KategoriInstansiController extends Controller
{
    public function index()
    {
        $dataKategoriInstansi = KategoriInstansi::all();
        return view('admin.kategori-instansi.index', compact('dataKategoriInstansi'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_nama' => 'required|unique:kategori_instansi',
        ]);

        try {
            DB::beginTransaction();
            $newKategoriInstansi = new KategoriInstansi();
            $newKategoriInstansi->kategori_nama = $data['kategori_nama'];
            $newKategoriInstansi->save();

            DB::commit();

            Session::flash('success', 'Berhasil menambahkan data');
            return redirect()->route('data-kategori-instansi.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
    public function edit($id)
    {
        $data = KategoriInstansi::findOrFail($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kategori_nama' => 'required|unique:kategori_instansi,kategori_nama,' . $id,
        ]);
        try {
            DB::beginTransaction();
            $dataKategoriInstansi = KategoriInstansi::findOrFail($id);
            $dataKategoriInstansi->kategori_nama = $data['kategori_nama'];
            $dataKategoriInstansi->save();

            DB::commit();
            Session::flash('success', 'Berhasil mengubah data');
            return redirect()->route('data-kategori-instansi.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $dataKategoriInstansi = KategoriInstansi::findOrFail($id);
            $dataKategoriInstansi->delete();
            DB::commit();
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('data-kategori-instansi.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}

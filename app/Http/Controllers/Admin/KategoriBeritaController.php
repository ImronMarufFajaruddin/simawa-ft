<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriBerita;
use Illuminate\Support\Facades\Session;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $dataKategoriBerita = KategoriBerita::latest()->get();
        return view('admin.kategori-berita.index', compact('dataKategoriBerita'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_nama' => 'required|unique:kategori_berita',
        ]);
        $data['slug'] = Str::slug($data['kategori_nama']);
        try {
            DB::beginTransaction();
            $newKategoriBerita = new KategoriBerita();
            $newKategoriBerita->kategori_nama = $data['kategori_nama'];
            $newKategoriBerita->slug = $data['slug'];
            $newKategoriBerita->save();

            DB::commit();
            Session::flash('success', 'Kategori Berita Berhasil Ditambahkan');
            return redirect()->route('data-kategori-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
    public function edit($id)
    {
        $data = KategoriBerita::findOrFail($id);
        return response()->json($data, 200);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kategori_nama' => 'required|unique:kategori_berita,kategori_nama,' . $id,
        ]);
        $data['slug'] = Str::slug($data['kategori_nama']);
        try {
            DB::beginTransaction();
            $dataKategoriBerita = KategoriBerita::findOrFail($id);
            $dataKategoriBerita->update($data);

            DB::commit();

            Session::flash('success', 'Kategori Berita Berhasil Diubah');
            return redirect()->route('data-kategori-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $dataKategoriBerita = KategoriBerita::findOrFail($id);
            $dataKategoriBerita->delete();
            DB::commit();
            Session::flash('success', 'Kategori Berita Berhasil Dihapus');
            return redirect()->route('data-kategori-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}

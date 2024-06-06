<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriBerita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BeritaController extends Controller
{
    public function index()
    {
        $dataKategoriBerita = KategoriBerita::all();
        $dataUser = User::all();
        $dataBerita = Berita::latest()->get();
        return view('admin.berita.index', compact('dataBerita', 'dataKategoriBerita', 'dataUser'));
    }

    public function create()
    {
        $statuses = ['Publish', 'Draft'];
        $dataKategoriBerita = KategoriBerita::all();

        return view('admin.berita.create', compact('statuses', 'dataKategoriBerita'));
    }

    public function store(Request $request)
    {
        $dataBerita = $request->validate([
            'kategori_berita_id' => 'required|exists:kategori_berita,id',
            'judul' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:2048',
            'dokumen' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:2048',
            'status' => 'required|in:Publish,Draft',
        ]);

        $dataBerita['slug'] = Str::slug($dataBerita['judul']);

        try {
            DB::beginTransaction();

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move('uploads/berita/foto', $fileName);
                $dataBerita['gambar'] = $fileName;
            }

            if ($request->hasFile('dokumen')) {
                $file = $request->file('dokumen');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move('uploads/berita/dokumen', $fileName);
                $dataBerita['dokumen'] = $fileName;
            }

            $berita = new Berita();
            $berita->kategori_berita_id = $dataBerita['kategori_berita_id'];
            $berita->user_id = Auth::id();
            $berita->slug = $dataBerita['slug'];
            $berita->judul = $dataBerita['judul'];
            $berita->gambar = $dataBerita['gambar'];
            $berita->dokumen = $dataBerita['dokumen'];
            $berita->status = $dataBerita['status'];

            Log::info('Inserting data into berita table', ['data' => $berita]);

            $berita->save();

            DB::commit();

            Session::flash('success', 'Data Berita Berhasil');
            return redirect()->route('data-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        // Implementasi tampilan berita berdasarkan ID
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}

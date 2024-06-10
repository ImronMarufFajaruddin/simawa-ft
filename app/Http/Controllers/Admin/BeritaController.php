<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Support\Str;
use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'konten' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:4096',
            'dokumen' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:2048',
            'status' => 'required|in:Publish,Draft',
            'tanggal_publish' => 'nullable|date',
        ]);

        $dataBerita['slug'] = Str::slug($dataBerita['judul']);

        try {
            DB::beginTransaction();

            if ($request->hasFile('gambar')) {
                $file_url = UploadFile::upload('uploads/berita/foto', $request->file('gambar'));
                $dataBerita['gambar'] = basename($file_url);
            }

            if ($request->hasFile('dokumen')) {
                $file_url = UploadFile::upload('uploads/berita/dokumen', $request->file('dokumen'));
                $dataBerita['dokumen'] = basename($file_url);
            }

            $berita = new Berita();
            $berita->kategori_berita_id = $dataBerita['kategori_berita_id'];
            $berita->user_id = Auth::id();
            $berita->slug = $dataBerita['slug'];
            $berita->konten = $dataBerita['konten'];
            $berita->judul = $dataBerita['judul'];
            $berita->gambar = $dataBerita['gambar'];
            $berita->dokumen = $dataBerita['dokumen'] ?? null;
            $berita->status = $dataBerita['status'];
            $berita->tanggal_publish = $dataBerita['tanggal_publish'];

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
        return view('admin.berita.show', [
            'dataBerita' => Berita::find($id)
        ]);
    }

    public function edit($id)
    {
        $statuses = ['Publish', 'Draft'];

        $dataKategoriBerita = KategoriBerita::all();
        $dataUser = User::all();
        $dataBerita = Berita::find($id);
        return view('admin.berita.edit', compact('dataBerita', 'dataKategoriBerita', 'dataUser', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $dataBerita = $request->validate([
            'kategori_berita_id' => 'required|exists:kategori_berita,id',
            'judul' => 'required',
            'konten' => 'required',
            'status' => 'required|in:Publish,Draft',
            'dokumen' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:2048',
            'gambar' => 'nullable|mimes:png,jpg,jpeg|max:4096',
            'tanggal_publish' => 'nullable|date',
        ]);

        $dataBerita['slug'] = Str::slug($dataBerita['judul']);

        try {
            DB::beginTransaction();

            $berita = Berita::find($id);
            $berita->kategori_berita_id = $dataBerita['kategori_berita_id'];
            $berita->user_id = Auth::id();
            $berita->slug = $dataBerita['slug'];
            $berita->konten = $dataBerita['konten'];
            $berita->judul = $dataBerita['judul'];
            $berita->status = $dataBerita['status'];
            $berita->tanggal_publish = $dataBerita['tanggal_publish'];

            if ($request->hasFile('gambar')) {
                // Menghapus file gambar lama jika ada
                if ($berita->gambar) {
                    DeleteFile::delete('uploads/berita/foto/' . $berita->gambar);
                }

                // Upload file gambar baru
                $file_url = UploadFile::upload('uploads/berita/foto', $request->file('gambar'));
                $berita->gambar = basename($file_url);
            }

            if ($request->hasFile('dokumen')) {
                // Menghapus file dokumen lama jika ada
                if ($berita->dokumen) {
                    DeleteFile::delete('uploads/berita/dokumen/' . $berita->dokumen);
                }
                // Upload file dokumen baru
                $file_url = UploadFile::upload('uploads/berita/dokumen', $request->file('dokumen'));
                $berita->dokumen = basename($file_url);
            }

            // Menghapus gambar CKEditor yang dihapus dari konten
            // CkeditorImage::deleteUnusedImages($berita->konten, $dataBerita['konten']);

            $berita->save();
            DB::commit();

            Session::flash('success', 'Data Berita Berhasil Diubah');
            return redirect()->route('data-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('data-berita.index')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $berita = Berita::find($id);
            if ($berita->gambar) {
                DeleteFile::delete('uploads/berita/foto/' . $berita->gambar);
            }
            if ($berita->dokumen) {
                DeleteFile::delete('uploads/berita/dokumen/' . $berita->dokumen);
            }

            // Menghapus gambar CKEditor
            // CkeditorImage::deleteImagesFromContent($berita->konten);

            $berita->delete();
            DB::commit();

            Session::flash('success', 'Data Berita Berhasil dihapus');
            return redirect()->route('data-berita.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // public function uploadImage(Request $request)
    // {
    //     if ($request->hasFile('upload')) {
    //         $file = $request->file('upload');
    //         $fileUrl = UploadFile::upload('uploads/konten-gambar', $file);
    //         return response()->json(['url' => asset($fileUrl)]);
    //     }

    //     return response()->json(['error' => 'Gagal Upload Gambar'], 500);
    // }
}

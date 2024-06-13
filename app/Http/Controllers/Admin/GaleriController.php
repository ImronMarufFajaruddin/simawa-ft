<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Models\Admin\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{

    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'gambar.*.required' => 'Setiap gambar harus diunggah.',
            'gambar.*.image' => 'Setiap file harus berupa gambar.',
            'gambar.*.mimes' => 'Setiap gambar harus memiliki tipe: jpeg, png, jpg, gif, svg.',
            'gambar.*.max' => 'Setiap gambar tidak boleh lebih dari 2MB.',
        ]);
        // dd($request->all());

        $galeri = new Galeri();
        $galeri->judul = $request->judul;

        if ($request->file('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('images'), $name);
                $data[] = $name;
            }
            $galeri->gambar = json_encode($data);
        }

        $galeri->save();

        return redirect()->route('data-galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $galeri = Galeri::findOrFail($id);
            $galeri->judul = $request->judul;

            if ($request->hasFile('gambar')) {
                DeleteFile::delete($galeri->gambar);

                $gambarUrls = [];
                foreach ($request('gambar') as $file) {
                    $file_url = UploadFile::upload('uploads/galeri', $file);
                    $gambarUrls[] = $file_url;
                }
                $galeri->gambar = json_encode($gambarUrls);
            }

            $galeri->save();

            DB::commit();

            return redirect()->route('data-galeri.index')->with('success', 'Galeri berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal memperbarui galeri: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $galeri = Galeri::findOrFail($id);
            DeleteFile::delete($galeri->gambar);
            $galeri->delete();

            DB::commit();

            return redirect()->route('data-galeri.index')->with('success', 'Galeri berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal menghapus galeri: ' . $e->getMessage());
        }
    }
}

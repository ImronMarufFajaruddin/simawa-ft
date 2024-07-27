<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Models\Admin\Galeri;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class GaleriController extends Controller
{
    public function getJudul(Request $request)
    {
        $search = $request->get('search', '');
        $judul = Galeri::where('judul', 'LIKE', "%$search%")->get(['id', 'judul']);

        return response()->json($judul);
    }

    public function index(Request $request)
    {
        $judul = $request->get('judul');

        if (Gate::allows('superadmin-only')) {
            $dataGaleri = $judul
                ? Galeri::where('judul', $judul)->paginate(12)
                : Galeri::paginate(12);
        } else {
            $dataGaleri = $judul
                ? Galeri::where('user_id', Auth::user()->id)->where('judul', $judul)->paginate(12)
                : Galeri::where('user_id', Auth::user()->id)->paginate(12);
        }

        $judulGaleri = Galeri::pluck('judul')->unique();

        return view('admin.galeri.index', compact('dataGaleri', 'judulGaleri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $dataGaleri = $request->validate([
            'judul' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:4096',
        ]);

        $dataGaleri['user_id'] = Auth::user()->id;

        try {
            DB::beginTransaction();

            $user = Auth::user(); // Ambil data user yang sedang login
            $username = str_replace(' ', '_', $user->name); // Ganti spasi dengan underscore

            if ($request->hasFile('gambar')) {
                $file_url = UploadFile::upload('uploads/galeri/foto', $request->file('gambar'), $username);
                $dataGaleri['gambar'] = basename($file_url);
            }

            $galeri = new Galeri();
            $galeri->user_id = $dataGaleri['user_id'];
            $galeri->judul = $dataGaleri['judul'];
            $galeri->gambar = $dataGaleri['gambar'];

            $galeri->save();

            DB::commit();
            Session::flash('success', 'Data Galeri Berhasil Ditambahkan');
            return redirect()->route('data-galeri.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $dataGaleri = Galeri::find($id);
        if ($dataGaleri) {
            return view('admin.galeri.edit', compact('dataGaleri'));
        } else {
            Session::flash('error', 'Data Galeri Tidak Ditemukan');
            return redirect()->route('data-galeri.index');
        }
    }

    public function update(Request $request, $id)
    {
        $dataGaleri = $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|mimes:png,jpg,jpeg|max:4096',
        ]);

        try {
            DB::beginTransaction();

            $galeri = Galeri::find($id);
            $user = Auth::user(); // Ambil data user yang sedang login
            $username = str_replace(' ', '_', $user->name); // Ganti spasi dengan underscore

            if (!$galeri) {
                Session::flash('error', 'Data Galeri Tidak Ditemukan');
                return redirect()->route('data-galeri.index');
            }

            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($galeri->gambar) {
                    DeleteFile::delete('uploads/galeri/foto/' . $galeri->gambar);
                }

                // Upload gambar baru
                $file_url = UploadFile::upload('uploads/galeri/foto', $request->file('gambar'), $username);
                $dataGaleri['gambar'] = basename($file_url);
            } else {
                // Gunakan gambar lama jika tidak ada gambar baru yang diunggah
                $dataGaleri['gambar'] = $galeri->gambar;
            }

            $galeri->update($dataGaleri);

            DB::commit();
            Session::flash('success', 'Data Galeri Berhasil Diubah');
            return redirect()->route('data-galeri.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $galeri = Galeri::find($id);

        DB::beginTransaction();
        try {
            if ($galeri->gambar) {
                DeleteFile::delete('uploads/galeri/foto/' . $galeri->gambar);
            }

            $galeri->delete();
            DB::commit();
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('data-galeri.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}

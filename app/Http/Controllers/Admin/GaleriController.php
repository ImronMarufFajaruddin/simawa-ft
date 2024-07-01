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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Models\Admin\TemporaryUploadGaleriModel;

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
            if ($judul) {
                $dataGaleri = Galeri::where('judul', $judul)->paginate(12);
            } else {
                $dataGaleri = Galeri::paginate(12);
            }
        } else {
            if ($judul) {
                $dataGaleri = Galeri::where('user_id', Auth::user()->id)
                    ->where('judul', $judul)
                    ->paginate(12);
            } else {
                $dataGaleri = Galeri::where('user_id', Auth::user()->id)->paginate(12);
            }
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

            if ($request->hasFile('gambar')) {
                $file_url = UploadFile::upload('uploads/galeri/foto', $request->file('gambar'));
                $dataGaleri['gambar'] = basename($file_url);
            }

            $galeri = new Galeri();

            $galeri->user_id = Auth::id();
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
        $dataGaleri['user_id'] = Auth::user()->id;

        try {
            DB::beginTransaction();

            $galeri = Galeri::find($id);

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
                $file_url = UploadFile::upload('uploads/galeri/foto', $request->file('gambar'));
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



    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'judul' => 'required',
    //         'gambar' => 'required|mimes:png,jpg,jpeg|max:2048',
    //     ]);

    //     try {
    //         DB::beginTransaction();


    //         if ($request->hasFile('gambar')) {
    //             $file_url = UploadFile::upload('uploads/galeri/', $request->file('gambar'));
    //             $dataGaleri['gambar'] = basename($file_url);
    //         }

    //         $dataGaleri = new Galeri();
    //         $dataGaleri['user_id'] = Auth::user()->id;
    //         $dataGaleri['judul'] = $request->input('judul');
    //         $dataGaleri['gambar'] = $dataGaleri['gambar'];

    //         $dataGaleri->save();

    //         DB::commit();
    //         Session::flash('success', 'Galeri berhasil ditambahkan');
    //         return redirect()->route('admin.galeri.index');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Session::flash('error', $e->getMessage());
    //         return redirect()->back();
    //     }
    // }

    // public function uploadTemporary(Request $request)
    // {
    //     if ($request->hasFile('gambar')) {
    //         $file = $request->file('gambar');
    //         $storageLocation = 'uploads/galeri/tmp/';
    //         $file_url = UploadFile::upload($storageLocation, $file);

    //         $instansi = Instansi::where('user_id', Auth::id())->first();
    //         if (!$instansi) {
    //             return response()->json(['error' => 'Anda tidak memiliki instansi'], 400);
    //         }

    //         $fileName = $file->getClientOriginalName(); // Ambil nama file asli
    //         TemporaryUploadGaleriModel::create([
    //             'instansi_id' => $instansi->id,
    //             'file_name' => $fileName, // Gunakan nama file asli untuk file_name
    //             'file_path' => str_replace(url('/') . '/', '', $file_url),
    //         ]);

    //         return response()->json(['filename' => $file_url]);
    //     }
    //     return response()->json(['error' => 'No file uploaded'], 400);
    // }

    // public function revertTemporary($filename)
    // {
    //     $temporaryFile = TemporaryUploadGaleriModel::where('file_name', $filename)->first();

    //     if ($temporaryFile) {
    //         // Hapus file dari folder temporary
    //         $oldPath = public_path($temporaryFile->file_path);
    //         if (File::exists($oldPath)) {
    //             File::delete($oldPath);
    //         }

    //         // Hapus data dari tabel temporary
    //         $temporaryFile->delete();

    //         return response()->json(['success' => 'File reverted successfully']);
    //     }

    //     return response()->json(['error' => 'File not found'], 404);
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'judul' => 'required',
    //     ]);

    //     $instansi = Instansi::where('user_id', Auth::id())->first();
    //     if (!$instansi) {
    //         return redirect()->back()->with('error', 'Anda tidak memiliki instansi');
    //     }

    //     $temporaryFiles = TemporaryUploadGaleriModel::where('instansi_id', $instansi->id)->get();

    //     try {
    //         DB::beginTransaction();

    //         foreach ($temporaryFiles as $temporaryFile) {
    //             $newFilePath = 'uploads/galeri/' . $instansi->nama_singkatan . '/' . $temporaryFile->file_name;

    //             // Pastikan folder instansi sudah ada, jika belum, buat folder baru
    //             if (!File::isDirectory(public_path('uploads/galeri/' . $instansi->nama_singkatan))) {
    //                 File::makeDirectory(public_path('uploads/galeri/' . $instansi->nama_singkatan), 0777, true, true);
    //             }

    //             // Pindahkan file dari folder temporary ke folder final
    //             $oldPath = public_path($temporaryFile->file_path);
    //             $newPath = public_path($newFilePath);
    //             if (File::exists($oldPath)) {
    //                 File::move($oldPath, $newPath);
    //             }

    //             Galeri::create([
    //                 'instansi_id' => $instansi->id,
    //                 'judul' => $request->judul,
    //                 'gambar' => $newFilePath,
    //             ]);

    //             $temporaryFile->delete();
    //         }

    //         DB::commit();
    //         Session::flash('success', 'Gambar berhasil diunggah');
    //         return redirect()->route('data-galeri.index');
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         Session::flash('error', 'Gagal mengunggah gambar: ' . $e->getMessage());
    //         return redirect()->route('data-galeri.create');
    //     }
    // }
}

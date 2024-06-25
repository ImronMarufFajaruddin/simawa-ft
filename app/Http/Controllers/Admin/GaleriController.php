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
use Illuminate\Support\Facades\Session;
use App\Models\Admin\TemporaryUploadGaleriModel;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::where('instansi_id', Auth::user()->instansi_id)->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function uploadTemporary(Request $request)
    {
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $storageLocation = 'uploads/galeri/tmp/';
            $file_url = UploadFile::upload($storageLocation, $file);

            $instansi = Instansi::where('user_id', Auth::id())->first();
            if (!$instansi) {
                return response()->json(['error' => 'Anda tidak memiliki instansi'], 400);
            }

            $fileName = $file->getClientOriginalName(); // Ambil nama file asli
            TemporaryUploadGaleriModel::create([
                'instansi_id' => $instansi->id,
                'file_name' => $fileName, // Gunakan nama file asli untuk file_name
                'file_path' => str_replace(url('/') . '/', '', $file_url),
            ]);

            return response()->json(['filename' => $file_url]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function revertTemporary($filename)
    {
        $temporaryFile = TemporaryUploadGaleriModel::where('file_name', $filename)->first();

        if ($temporaryFile) {
            // Hapus file dari folder temporary
            $oldPath = public_path($temporaryFile->file_path);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // Hapus data dari tabel temporary
            $temporaryFile->delete();

            return response()->json(['success' => 'File reverted successfully']);
        }

        return response()->json(['error' => 'File not found'], 404);
    }



    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
        ]);

        $instansi = Instansi::where('user_id', Auth::id())->first();
        if (!$instansi) {
            return redirect()->back()->with('error', 'Anda tidak memiliki instansi');
        }

        $temporaryFiles = TemporaryUploadGaleriModel::where('instansi_id', $instansi->id)->get();

        try {
            DB::beginTransaction();

            foreach ($temporaryFiles as $temporaryFile) {
                $newFilePath = 'uploads/galeri/' . $instansi->nama_singkatan . '/' . $temporaryFile->file_name;

                // Pastikan folder instansi sudah ada, jika belum, buat folder baru
                if (!File::isDirectory(public_path('uploads/galeri/' . $instansi->nama_singkatan))) {
                    File::makeDirectory(public_path('uploads/galeri/' . $instansi->nama_singkatan), 0777, true, true);
                }

                // Pindahkan file dari folder temporary ke folder final
                $oldPath = public_path($temporaryFile->file_path);
                $newPath = public_path($newFilePath);
                if (File::exists($oldPath)) {
                    File::move($oldPath, $newPath);
                }

                Galeri::create([
                    'instansi_id' => $instansi->id,
                    'judul' => $request->judul,
                    'gambar' => $newFilePath,
                ]);

                $temporaryFile->delete();
            }

            DB::commit();
            Session::flash('success', 'Gambar berhasil diunggah');
            return redirect()->route('data-galeri.index');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', 'Gagal mengunggah gambar: ' . $e->getMessage());
            return redirect()->route('data-galeri.create');
        }
    }
}

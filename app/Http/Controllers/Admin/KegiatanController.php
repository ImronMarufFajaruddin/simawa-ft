<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Kegiatan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class KegiatanController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        if (Gate::allows('superadmin-only')) {
            // Superadmin lihat semua data
            $dataKegiatan = Kegiatan::all();
        } else {
            // Admin lihat datanya sendiri
            $dataKegiatan = Kegiatan::where('user_id', $user->id)->with('user')->get();
        }
        return view('admin.kegiatan.index', compact('dataKegiatan'));
    }

    public function store(Request $request)
    {
        $dataKegiatan = $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        try {

            DB::beginTransaction();

            $kegiatan = new Kegiatan();
            $kegiatan->user_id = Auth::id();
            $kegiatan->nama_kegiatan = $dataKegiatan['nama_kegiatan'];
            $kegiatan->tanggal_mulai = $dataKegiatan['tanggal_mulai'];
            $kegiatan->tanggal_selesai = $dataKegiatan['tanggal_selesai'];
            $kegiatan->save();
            DB::commit();
            Session::flash('success', 'Data kegiatan berhasil ditambahkan');
            return redirect()->route('data-kegiatan.index');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', 'Data kegiatan gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $dataKegiatan = Kegiatan::findOrFail($id);
        return response()->json($dataKegiatan, 200);
    }

    public function update(Request $request, $id)
    {
        $dataKegiatan = $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $kegiatan = Kegiatan::findOrFail($id);
            $kegiatan->user_id = Auth::id();
            $kegiatan->nama_kegiatan = $dataKegiatan['nama_kegiatan'];
            $kegiatan->tanggal_mulai = $dataKegiatan['tanggal_mulai'];
            $kegiatan->tanggal_selesai = $dataKegiatan['tanggal_selesai'];
            $kegiatan->save();
            DB::commit();
            Session::flash('success', 'Data kegiatan berhasil diubah');
            return redirect()->route('data-kegiatan.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Data kegiatan gagal diubah');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $dataKegiatan = Kegiatan::findOrFail($id);
            $dataKegiatan->delete();
            DB::commit();
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('data-kegiatan.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}

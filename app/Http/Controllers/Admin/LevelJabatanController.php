<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\LevelJabatan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Instansi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LevelJabatanController extends Controller
{
    public function index()
    {
        $dataLevelJabatan = LevelJabatan::all();
        return view('admin.level-jabatan.index', compact('dataLevelJabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'periode' => 'required|unique:level_jabatan',
            'mulai_periode' => 'required|numeric',
            'akhir_periode' => 'required|numeric',
            'nama_jabatan' => 'required|unique:level_jabatan',
        ]);

        $mulai_periode = $request->input('mulai_periode');
        $akhir_periode = $request->input('akhir_periode');
        $nama_jabatan = $request->input('nama_jabatan');

        $periode = $mulai_periode . ' - ' . $akhir_periode;

        try {
            DB::beginTransaction();
            $dataLevelJabatan = new LevelJabatan();
            // $dataLevelJabatan->user_id = Auth::id();

            $dataLevelJabatan = Instansi::find($request->input('instansi_id'));
            $dataLevelJabatan->periode = $periode;
            $dataLevelJabatan->nama_jabatan = $nama_jabatan;
            // dd($dataLevelJabatan);
            $dataLevelJabatan->save();
            DB::commit();
            return redirect()->route('data-level-jabatan.index')->with('success', 'Level Jabatan Berhasil Diubah');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', 'Level Jabatan Gagal Diubah');
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
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

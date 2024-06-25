<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use App\Models\Admin\LevelJabatan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class LevelJabatanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $instansi = Instansi::where('user_id', $user->id)->first();

        if (Gate::allows('superadmin-only')) {
            $dataLevelJabatan = LevelJabatan::all();
        } else {
            if ($instansi) {
                $dataLevelJabatan = LevelJabatan::where('instansi_id', $instansi->id)->get();
            } else {
                $dataLevelJabatan = collect();
            }
        }

        return view('admin.level-jabatan.index', compact('dataLevelJabatan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'mulai_periode' => 'required|numeric',
            'akhir_periode' => 'required|numeric',
            'level' => 'required',
            'nama_jabatan' => 'required',
        ]);

        $mulai_periode = $request->input('mulai_periode');
        $akhir_periode = $request->input('akhir_periode');
        $level = $request->input('level');
        $nama_jabatan = $request->input('nama_jabatan');
        $periode = $mulai_periode . ' - ' . $akhir_periode;

        try {
            DB::beginTransaction();
            $dataLevelJabatan = new LevelJabatan();

            $instansi = Instansi::where('user_id', Auth::id())->first();
            if (!$instansi) {
                throw new \Exception('Anda Tidak Memiliki Instansi.');
            }

            $existingJabatan = LevelJabatan::where('instansi_id', $instansi->id)
                ->where('nama_jabatan', $nama_jabatan)
                ->exists();
            if ($existingJabatan) {
                throw new \Exception('Nama Jabatan sudah ada untuk instansi anda.');
            }

            $dataLevelJabatan->periode = $periode;
            $dataLevelJabatan->level = $level;
            $dataLevelJabatan->nama_jabatan = $nama_jabatan;
            $dataLevelJabatan->instansi_id = $instansi->id;

            $dataLevelJabatan->save();
            DB::commit();
            return redirect()->route('data-level-jabatan.index')->with('success', 'Level Jabatan Berhasil Disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', 'Level Jabatan Gagal Disimpan: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
    public function edit($id)
    {
        $dataInstansi = Instansi::findOrFail($id);
        return response()->json($dataInstansi, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mulai_periode' => 'required|numeric',
            'akhir_periode' => 'required|numeric',
            'level' => 'required',
            'nama_jabatan' => 'required',
        ]);

        $mulai_periode = $request->input('mulai_periode');
        $akhir_periode = $request->input('akhir_periode');
        $level = $request->input('level');
        $nama_jabatan = $request->input('nama_jabatan');
        $periode = $mulai_periode . ' - ' . $akhir_periode;

        try {
            DB::beginTransaction();
            $dataLevelJabatan = LevelJabatan::findOrFail($id);

            $instansi = Instansi::where('user_id', Auth::id())->first();
            if (!$instansi) {
                throw new \Exception('Anda Tidak Memiliki Instansi.');
            }

            $existingJabatan = LevelJabatan::where('instansi_id', $instansi->id)
                ->where('id', '!=', $dataLevelJabatan->id)
                ->where('nama_jabatan', $nama_jabatan)
                ->exists();
            if ($existingJabatan) {
                throw new \Exception('Nama Jabatan sudah ada untuk instansi anda.');
            }

            $dataLevelJabatan->periode = $periode;
            $dataLevelJabatan->level = $level;
            $dataLevelJabatan->nama_jabatan = $nama_jabatan;
            $dataLevelJabatan->instansi_id = $instansi->id;

            $dataLevelJabatan->save();
            DB::commit();

            return redirect()->route('data-level-jabatan.index')->with('success', 'Level Jabatan Berhasil Diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Level Jabatan Gagal Diperbarui: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $dataLevelJabatan = LevelJabatan::findOrFail($id);
            $dataLevelJabatan->delete();
            DB::commit();
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('data-level-jabatan.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}

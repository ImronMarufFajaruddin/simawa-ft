<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use App\Models\Admin\Kegiatan;
use App\Models\Admin\Proposal;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ProposalController extends Controller

{
    public function index()
    {
        $user = Auth::user();
        if (Gate::allows('superadmin-only')) {
            // Superadmin lihat semua data
            $dataProposal = Proposal::all();
            $dataKegiatan = Kegiatan::all();
        } else {
            // Admin lihat datanya sendiri
            $dataProposal = Proposal::where('user_id', $user->id)->with('user')->get();
            $dataKegiatan = Kegiatan::where('user_id', $user->id)->with('user')->get();
        }

        return view('admin.proposal.index', compact('dataProposal', 'dataKegiatan'));
    }

    public function show($id)
    {
        $proposal = Proposal::find($id);
        if (!Gate::allows('superadmin-only') && $proposal->user_id !== Auth::id()) {
            abort(403);
        }

        return view('admin.proposal.show', [
            'dataProposal' => $proposal
        ]);
    }

    public function store(Request $request)
    {
        $dataProposal = $request->validate([
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'dokumen' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        try {

            DB::beginTransaction();
            if ($request->hasFile('dokumen')) {
                $file_url = UploadFile::upload('dokumen/proposal', $request->file('dokumen'));
                $dataProposal['dokumen'] = basename($file_url);
            }

            $proposal = new Proposal();
            $proposal->user_id = Auth::id();
            $proposal->kegiatan_id = $dataProposal['kegiatan_id'];
            $proposal->dokumen = $dataProposal['dokumen'];
            $proposal->status = 'menunggu'; // status default
            $proposal->komentar = null;
            $proposal->save();
            DB::commit();
            Session::flash('success', 'Data proposal berhasil ditambahkan');
            return redirect()->route('data-proposal.index');
        } catch (\Exception $e) {
            DB::rollback();
            // Session::flash('error', 'Data proposal gagal ditambahkan');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        if (Gate::denies('superadmin-only')) {
            $dataProposal = Proposal::findOrFail($id);
            return response()->json($dataProposal, 200);
        }

        return response()->json(['error' => 'Superadmin tidak diizinkan untuk mengedit proposal'], 403);
    }
    public function update(Request $request, $id)
    {
        if (Gate::denies('superadmin-only')) {
            $dataProposal = $request->validate([
                'kegiatan_id' => 'required|exists:kegiatan,id',
                'dokumen' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048',
            ]);
            try {
                DB::beginTransaction();

                $proposal = Proposal::findOrFail($id);
                $proposal->user_id = Auth::id();
                $proposal->kegiatan_id = $dataProposal['kegiatan_id'];
                $proposal->dokumen = $dataProposal['dokumen'];

                if ($request->hasFile('dokumen')) {
                    // Menghapus file dokumen lama jika ada
                    if ($proposal->dokumen) {
                        DeleteFile::delete('dokumen/proposal/' . $proposal->dokumen);
                    }
                    // Upload file dokumen baru
                    $file_url = UploadFile::upload('dokumen/proposal/', $request->file('dokumen'));
                    $proposal->dokumen = basename($file_url);
                }
                $proposal->status = 'menunggu';
                $proposal->save();
                DB::commit();

                Session::flash('success', 'Data proposal berhasil diperbarui');
                return redirect()->route('data-proposal.index');
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('error', 'Data proposal gagal diperbarui');
                return redirect()->back();
            }
        }

        return redirect()->back()->with('error', 'Superadmin tidak diizinkan untuk mengedit proposal');
    }

    public function tambahKomentar(Request $request, $id)
    {
        $proposal = Proposal::findOrFail($id);

        if (!Gate::allows('superadmin-only')) {
            abort(403);
        }
        $request->validate([
            'komentar' => 'required|string',
        ]);

        $proposal->komentar = $request->komentar;
        $proposal->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function updateStatus(Request $request, $id)
    {
        $proposal = Proposal::findOrFail($id);

        if ($proposal->status == 'diterima' || $proposal->status == 'ditolak') {
            return back()->withErrors(['status' => 'Status sudah ' . $proposal->status . ', tidak dapat diubah.']);
        }


        $proposal->status = $request->status;
        $proposal->save();

        return redirect()->route('data-proposal.index')->with('success', 'Status proposal berhasil diperbarui.');
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $dataProposal = Proposal::find($id);

            if ($dataProposal->dokumen) {
                DeleteFile::delete('dokumen/proposal/' . $dataProposal->dokumen);
            }

            $dataProposal->delete();
            DB::commit();
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('data-proposal.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}

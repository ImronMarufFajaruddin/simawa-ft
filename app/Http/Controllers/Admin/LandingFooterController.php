<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Landing\Footer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Landing\HeroModel;
use Illuminate\Support\Facades\Session;

class LandingFooterController extends Controller
{
    public function footerIndex()
    {
        $dataFooter = Footer::all();
        return view('admin.landing-setting.footerIndex', compact('dataFooter'));
    }

    public function footerCreate()
    {
        return view('admin.landing-setting.footerCreate');
    }

    public function footerStore(Request $request)
    {
        $data = $request->validate(
            [
                'alamat' => 'nullable',
                'telp' => 'nullable|numeric',
                'email' => 'nullable|email',
                'medsos_links' => 'nullable|url',
                'medsos_icon' => 'nullable',
                'useful_links' => 'nullable',
                'useful_links_title' => 'nullable',
            ],
            [
                'email.email' => 'Email tidak valid',
                'medsos_links.url' => 'URL Medsos Links tidak valid',
                'useful_links.url' => 'URL Useful Links tidak valid',
            ]
        );

        try {
            DB::beginTransaction();
            $dataFooter = new Footer();
            $dataFooter->alamat = $data['alamat'];
            $dataFooter->telp = $data['telp'];
            $dataFooter->email = $data['email'];
            $dataFooter->medsos_links = $data['medsos_links'];
            $dataFooter->medsos_icon = $data['medsos_icon'];
            $dataFooter->useful_links = $data['useful_links'];
            $dataFooter->useful_links_title = $data['useful_links_title'];
            $dataFooter->save();
            DB::commit();
            Session::flash('success', 'Data Berhasil Disimpan');
            return redirect()->route('data-landings.footerIndex');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function footerEdit($id)
    {
        $dataFooter = Footer::findOrFail($id);
        return view('admin.landing-setting.footerEdit', compact('dataFooter'));
    }

    public function footerUpdate(Request $request, $id)
    {
        $data = $request->validate(
            [
                'alamat' => 'nullable',
                'telp' => 'nullable|numeric',
                'email' => 'nullable|email',
                'medsos_links' => 'nullable|url',
                'medsos_icon' => 'nullable',
                'useful_links' => 'nullable',
                'useful_links_title' => 'nullable',
            ],
            [
                'email.email' => 'Email tidak valid',
                'medsos_links.url' => 'URL Medsos Links tidak valid',
                'useful_links.url' => 'URL Useful Links tidak valid',
            ]
        );

        try {
            DB::beginTransaction();
            $dataFooter = Footer::findOrFail($id);
            $dataFooter->alamat = $data['alamat'];
            $dataFooter->telp = $data['telp'];
            $dataFooter->email = $data['email'];
            $dataFooter->medsos_links = $data['medsos_links'];
            $dataFooter->medsos_icon = $data['medsos_icon'];
            $dataFooter->useful_links = $data['useful_links'];
            $dataFooter->useful_links_title = $data['useful_links_title'];
            $dataFooter->save();
            DB::commit();
            Session::flash('success', 'Data Berhasil Diubah');
            return redirect()->route('data-landings.footerIndex');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function footerDestroy($id)
    {
        try {
            DB::beginTransaction();
            $dataFooter = Footer::findOrFail($id);

            $dataFooter->delete();
            DB::commit();
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('data-landings.footerIndex');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use App\Models\Landing\HeroModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LandingHeroController extends Controller
{
    public function heroIndex()
    {
        $dataHero = HeroModel::all();

        return view('admin.landing-setting.heroIndex', compact('dataHero'));
    }

    public function heroShow($id)
    {
        $dataHero = HeroModel::find($id);
        return view('admin.landing-setting.heroShow', compact('dataHero'));
    }

    public function heroCreate()
    {
        return view('admin.landing-setting.heroCreate');
    }

    public function heroStore(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'hero_deskripsi' => 'required',
                'logo' => 'required|mimes:png,jpg,jpeg|max:6048',
                'about_title' => 'required',
                'about' => 'required',
                'about_foto' => 'required|mimes:png,jpg,jpeg|max:6048',
            ],
            [
                'title.required' => 'Judul harus diisi',
                'hero_deskripsi.required' => 'Deskripsi harus diisi',
                'logo.required' => 'Logo harus diisi',
                'about_foto.required' => 'Foto harus diisi',
            ]
        );
        try {
            DB::beginTransaction();

            if ($request->hasFile('logo')) {
                $file_url = UploadFile::upload('landing/hero/logo', $request->file('logo'));
                $data['logo'] = basename($file_url);
            }

            if ($request->hasFile('about_foto')) {
                $file_url = UploadFile::upload('landing/hero/about', $request->file('about_foto'));
                $data['about_foto'] = basename($file_url);
            }

            $newHero = new HeroModel();
            $newHero->title = $data['title'];
            $newHero->hero_deskripsi = $data['hero_deskripsi'];
            $newHero->logo = $data['logo'];
            $newHero->about_title = $data['about_title'];
            $newHero->about = $data['about'];
            $newHero->about_foto = $data['about_foto'];
            $newHero->save();
            DB::commit();

            Session::flash('success', 'Data Berhasil Disimpan');
            return redirect()->route('data-landings.heroIndex');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function heroEdit($id)
    {
        $dataHero = HeroModel::findOrFail($id);
        return view('admin.landing-setting.heroEdit', compact('dataHero'));
    }

    public function heroUpdate(Request $request, $id)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'hero_deskripsi' => 'required',
                'logo' => 'mimes:png,jpg,jpeg|max:2048',
                'about_title' => 'required',
                'about' => 'required',
                'about_foto' => 'mimes:png,jpg,jpeg|max:2048',
            ],
            [
                'title.required' => 'Judul harus diisi',
                'hero_deskripsi.required' => 'Deskripsi harus diisi',
            ]
        );

        $dataHero = HeroModel::findOrFail($id);
        $logoLama = $dataHero->logo;
        $aboutFotoLama = $dataHero->about_foto;

        try {
            DB::beginTransaction();

            if ($request->hasFile('logo')) {
                if ($logoLama) {
                    DeleteFile::delete('landing/hero/logo/' . $logoLama);
                }
                $file_url = UploadFile::upload('landing/hero/logo', $request->file('logo'));
                $data['logo'] = basename($file_url);
            } else {
                $data['logo'] = $logoLama; // Gunakan logo lama jika tidak ada file baru
            }

            if ($request->hasFile('about_foto')) {
                if ($aboutFotoLama) {
                    DeleteFile::delete('landing/hero/about/' . $aboutFotoLama);
                }
                $file_url = UploadFile::upload('landing/hero/about', $request->file('about_foto'));
                $data['about_foto'] = basename($file_url);
            } else {
                $data['about_foto'] = $aboutFotoLama; // Gunakan foto lama jika tidak ada file baru
            }

            $dataHero->title = $data['title'];
            $dataHero->hero_deskripsi = $data['hero_deskripsi'];
            $dataHero->logo = $data['logo'];
            $dataHero->about_title = $data['about_title'];
            $dataHero->about = $data['about'];
            $dataHero->about_foto = $data['about_foto'];
            $dataHero->save();

            DB::commit();
            Session::flash('success', 'Data Berhasil Disimpan');
            return redirect()->route('data-landings.heroIndex');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function heroDestroy($id)
    {
        try {
            DB::beginTransaction();
            $dataHero = HeroModel::findOrFail($id);

            if ($dataHero->logo) {
                DeleteFile::delete('landing/hero/logo/' . $dataHero->logo);
            }
            if ($dataHero->about_foto) {
                DeleteFile::delete('landing/hero/about/' . $dataHero->about_foto);
            }

            $dataHero->delete();
            DB::commit();
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('data-landings.heroIndex');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}

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
        $dataHero = HeroModel::findOrFail($id);
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

            $username = auth()->user()->username; // Mengambil username pengguna yang sedang login

            // Upload logo
            if ($request->hasFile('logo')) {
                $file_url = UploadFile::upload('landing/hero/logo', $request->file('logo'), $username);
                $data['logo'] = basename($file_url);
            }

            // Upload foto about
            if ($request->hasFile('about_foto')) {
                $file_url = UploadFile::upload('landing/hero/about', $request->file('about_foto'), $username);
                $data['about_foto'] = basename($file_url);
            }

            // Simpan data Hero
            HeroModel::create([
                'title' => $data['title'],
                'hero_deskripsi' => $data['hero_deskripsi'],
                'logo' => $data['logo'],
                'about_title' => $data['about_title'],
                'about' => $data['about'],
                'about_foto' => $data['about_foto'],
            ]);

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
                'logo' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'about_title' => 'required',
                'about' => 'required',
                'about_foto' => 'nullable|mimes:png,jpg,jpeg|max:2048',
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

            $username = auth()->user()->username; // Mengambil username pengguna yang sedang login

            // Update logo
            if ($request->hasFile('logo')) {
                if ($logoLama) {
                    DeleteFile::delete('landing/hero/logo/' . $logoLama);
                }
                $file_url = UploadFile::upload('landing/hero/logo', $request->file('logo'), $username);
                $data['logo'] = basename($file_url);
            } else {
                $data['logo'] = $logoLama; // Gunakan logo lama jika tidak ada file baru
            }

            // Update foto about
            if ($request->hasFile('about_foto')) {
                if ($aboutFotoLama) {
                    DeleteFile::delete('landing/hero/about/' . $aboutFotoLama);
                }
                $file_url = UploadFile::upload('landing/hero/about', $request->file('about_foto'), $username);
                $data['about_foto'] = basename($file_url);
            } else {
                $data['about_foto'] = $aboutFotoLama; // Gunakan foto lama jika tidak ada file baru
            }

            // Simpan perubahan
            $dataHero->update([
                'title' => $data['title'],
                'hero_deskripsi' => $data['hero_deskripsi'],
                'logo' => $data['logo'],
                'about_title' => $data['about_title'],
                'about' => $data['about'],
                'about_foto' => $data['about_foto'],
            ]);

            DB::commit();
            Session::flash('success', 'Data Berhasil Disimpan');
            return redirect()->route('data-landings.heroIndex');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function heroDestroy($id)
    {
        try {
            DB::beginTransaction();
            $dataHero = HeroModel::findOrFail($id);

            // Hapus file logo jika ada
            if ($dataHero->logo) {
                DeleteFile::delete('landing/hero/logo/' . $dataHero->logo);
            }
            // Hapus file foto about jika ada
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

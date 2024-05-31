<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAdminController extends Controller
{
    public function index()
    {
        $datauser = User::latest()->get();
        return view('admin.user.index', compact('datauser'));
    }

    public function store(Request $request)
    {

        // Validasi input
        $data = $request->validate([
            'name' => 'required|min:3|unique:users',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'role' => 'required',
        ]);

        try {
            // Memulai transaksi database
            DB::beginTransaction();

            // Membuat instance baru dari model User dan mengisi atributnya
            $newUser = new User();
            $newUser->name = $data['name'];
            $newUser->username = $data['username'];
            $newUser->email = $data['email'];
            $newUser->role = $data['role'];
            $newUser->password = Hash::make($request->username);
            $newUser->save();

            // Commit transaksi jika tidak ada masalah
            DB::commit();

            // Redirect ke halaman utama dengan pesan sukses


            Session::flash('success', 'Berhasil menambahkan data');
            return redirect()->route('admin.user.index');
            // return redirect()->route('admin.user.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada kesalahan
            DB::rollBack();
            // Redirect kembali dengan pesan error
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return response()->json($data, 200);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
        ]);

        try {

            DB::beginTransaction();

            $user = User::findOrFail($id);

            if ($request->email != $user->email) {
                $existingUser = User::where('id', '!=', $user->id)->where('email', $request->email)->first();
                if ($existingUser) {
                    return redirect()->back()->with('error', 'Email sudah digunakan');
                }
            }

            $user->name = $data['name'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->role = $data['role'];
            $user->save();

            DB::commit();
            Session::flash('success', 'Berhasil update data');
            return redirect()->route('admin.user.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            $user->delete();

            DB::commit();

            // Session()->flash('success', 'User deleted successfully');
            Session::flash('success', 'Data Berhasil dihapus');

            return redirect()->route('admin.user.index');
            // return redirect()->route('admin.user.index')->with('messageSuccess', 'User deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

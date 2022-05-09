<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // Menampilkan DataData Users untuk Admin
    public function index()
    {
        $users = User::all();
        return view('pages.user', compact('users'));
    }
    // Tahapan Register
    public function register()
    {
        return view('auth.register');
    }
    public function registerPost(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'nik' => 'required|unique:users,email'
            ],
            [
                'nama.unique' => 'Nama sudah terdaftar',
                'nik.unique' => 'NIK sudah terdaftar'
            ]
        );
        $data = [
            'nama' => $request->nama,
            'nik' => $request->nik,
            'negara' => $request->negara,
            'role' => 'user',
            'email' => $request->nik,
            'password' => bcrypt($request->nik) //Meng-bcrypt password supaya tidak terlihat
        ];
        // dd($data);
        user::create($data);
        return redirect('/');
    }

    public function deleteUser($id)
    {
        if (auth()->user()->role == 'admin') {
            $data = User::find($id);
            $data->delete();

            return redirect('/dashboard');
        } elseif (auth()->user()->role == 'user') {
            $data = User::find($id)->delete();

            return redirect('/');
        } else {
            dd($id);
        }
    }
    public function profile()
    {
        return view('pages.user.profile');
    }

    public function editProfile($id)
    {
        $data = User::find($id);
        return view('pages.user.edit_profile');
    }

    public function updateData(Request $request, $id)
    {
        $data = User::find($id);
        $data->update($request->all());
        if ($request->hasFile('img')) {
            $request->file('img')->move('img/', $request->file('img')->getClientOriginalName());
            $data->img = $request->file('img')->getClientOriginalName();
            $data->update();
        }
        return redirect('/dashboard');
    }


    // Tahapan Login
    public function login()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        if (Auth::attempt($request->only('nama', 'email', 'password'))) {
            return redirect('/dashboard');
        }
        return redirect('/');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

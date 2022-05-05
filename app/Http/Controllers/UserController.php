<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // Menampilkan DataData Users dan Admin
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
            'role' => 'user',
            'email' => $request->nik,
            'password' => bcrypt($request->nik)
        ];
        // dd($data);
        user::create($data);
        return redirect('/');
    }

    public function deleteUser($id)
    {
        if (auth()->user()->role == 'user') {
            $data = User::find($id);
            $data->delete();

            return redirect('/user');
        } else {
        }
    }
    public function profile()
    {
        return view('pages.user.profile');
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

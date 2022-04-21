<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Perjalanan;
use Illuminate\Support\Facades\Redis;

class PerjalananController extends Controller
{
    public function index()
    {
        $data = Perjalanan::all();
        return view('pages.dashboard', compact('data'));
    }
    public function form()
    {
        return view('pages.form');
    }
    public function formPost(Request $request)
    {
        $data = [
            'id_user' => 1,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'suhu' => $request->suhu,
            'jam' => $request->jam
        ];
        // dd($data);
        Perjalanan::create($data);
        return redirect('/dashboard');
    }
    public function tampilData($id)
    {
        $data = Perjalanan::find($id);
        return view('pages.tampildata', compact('data'));
    }
    public function updateData(Request $request, $id)
    {
        $data = Perjalanan::find($id);
        $data->update($request->all());

        return redirect('/dashboard');
    }
    public function deleteData($id)
    {
        $data = Perjalanan::find($id);
        $data->delete();

        return redirect('/dashboard');
    }
}

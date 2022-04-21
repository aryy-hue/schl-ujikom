<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Perjalanan;

class PerjalananController extends Controller
{
    public function index(){
        $data = Perjalanan::all();
        return view('pages.dashboard', compact('data'));
    }
    public function form(){
        return view('pages.form');
    }
    public function formPost(Request $request){
        $data = [
            'id_user' => 1 ,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'suhu' => $request->suhu,
            'jam' => $request->jam
        ];
        // dd($data);
        Perjalanan::create($data);
        return redirect('/dashboard');
    }

}

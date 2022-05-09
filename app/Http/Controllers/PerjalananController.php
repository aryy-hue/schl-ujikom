<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Perjalanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
// use Barryvdh\DomPDF\PDF;
use PDF;

class PerjalananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'id_user' => Auth::user()->id,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'suhu' => $request->suhu,
            'jam' => $request->jam
        ];
        // dd($data);
        Perjalanan::create($data);
        return redirect('/dashboard')->with('success', 'Data Berhasil Ditambahkan');
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

        return redirect('/dashboard')->with('success', 'Data Berhasil DiUbah');
    }
    // PRINT DATA PDF PERJALANAN
    public function print_pdf()
    {
        $data = Perjalanan::all();

        $pdf = PDF::loadview('pages.print_pdf',  compact('data'));
        return $pdf->download('laporan-perjalanan.pdf');
    }
}

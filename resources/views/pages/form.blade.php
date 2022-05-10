@extends('layouts.master')
@section('title', 'Form Perjalanan')
@section('headline', 'Form Perjalanan')
@section('comment',
    'Ini adalah halaman form , untuk menambah data perjalananan',)
@section('content')
    <form action="/formPost" method="POST" class="user">
        {{ csrf_field() }}
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftarkan Perjalanan Anda !</h1>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="lokasi" name="lokasi"
                                        placeholder="Lokasi">
                                </div>
                                <div class="col-sm-6">
                                    <input type="time" class="form-control form-control-user" id="jam" name="jam"
                                        placeholder="Jam">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="date" class="form-control form-control-user" id="suhu"
                                        placeholder="Tanggal" name="tanggal">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="suhu" placeholder="Suhu"
                                        name="suhu">
                                </div>
                            </div>
                            <button class="btn btn-sec btn-user btn-block">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@extends('layouts.master')
@section('headline', 'Profile')
@section('title', 'Profile User')
@section('comment','Tampilan halaman user',)
@section('content')
<link href="{{ asset('./css/profile.css')}}" rel="stylesheet"  >
<form action="/user/profile/updateData/{{ auth()->user()->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="wrapper bg-white mt-sm-5 mb-sm-5">
        <h4 class="pb-4 border-bottom">Account settings</h4>
        <div class="d-flex align-items-start py-3 border-bottom">
            <img src="{{asset('img/'.Auth::user()->img)}}" class="img" alt="">
            <div class="pl-sm-4 pl-2" id="img-section">
                <b>Profile Photo</b>
                <p>Accepted file type .png. Less than 1MB</p>
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01" value="{{ auth()->user()->nama }}" id="img" name="img">
                      <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
                    </div>
                  </div>
            </div>
        </div>
        <div class="py-2">
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="firstname">Nama</label>
                    <input type="text" class="bg-light form-control" id="nama" name="nama" value="{{ auth()->user()->nama }}">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="lastname">NIK</label>
                    <input type="text" class="bg-light form-control" id="nik" name="nik"  value="{{ auth()->user()->nik }}" disabled>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="lastname">Negara</label>
                    <input type="text" class="bg-light form-control" id="negara" name="negara" value="{{ auth()->user()->negara }}">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="lastname">Email</label>
                    <input type="text" class="bg-light form-control" id="email" name="email" value="{{ auth()->user()->email }}" >
                </div>
            </div>
            {{-- <div class="row py-2">
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="lastname">Password</label>
                    <input type="password" class="bg-light form-control" id="password" name="password" value="{{ auth()->user()->password }}">
                </div>
            </div> --}}
            <div class="py-3 pb-4 border-bottom">
                <button class="btn btn-sec mr-3">Save Changes</button>
                <a href="/user/profile"class="btn border button">Cancel</a>
            </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
            <div>
                <b>Hapus Account</b>
                <p>Semua data akan terhapus</p>
            </div>
            <div class="ml-auto">
                <a href='/deleteUser/{{ auth()->user()->id}}' class="btn danger">Hapus Account</a>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
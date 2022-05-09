@extends('layouts.master')
@section('headline', 'Profile')
@section('title', 'Profile User')
@section('comment','Tampilan halaman user',)
@section('content')
<link href="{{ asset('./css/profile.css')}}" rel="stylesheet"  >
<section>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-4">
  
          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">
              <div class="mt-3 mb-4">
                <img src="{{asset('img/'.Auth::user()->img)}}"
                  class=" img-fluid" style="width: 150px; border-radius: 15px;" />
              </div>
              <h4 class="mb-2">{{ auth()->user()->nama }}</h4>
              <p class="text-muted mb-4">{{ auth()->user()->negara }} <span class="mx-2">|</span> 
                  {{ auth()->user()->nik }}</p>
              <a href="/user/profile/edit" type="button" class="btn btn-primary btn-rounded btn-lg">
                Edit Data
              </a>
             
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </section>
@endsection
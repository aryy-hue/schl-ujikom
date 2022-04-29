@extends('layouts.master')
@section('title', 'Data Perjalanan')
@section('headline' , 'Data Perjalanan')
@section('comment' , 'Disini kita bisa mengedit Data Perjalanan')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="/updateData/{{$data->id}}">
        {{ csrf_field() }}
            <div class="mb-3">
              <label for="lokasi" class="form-label">Lokasi</label>
              <input value="{{$data->lokasi}}" name="lokasi" type="lokasi" class="form-control" id="lokasi" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input value="{{$data->tanggal}}" name="tanggal" type="date" class="form-control" id="tanggal" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="jam" class="form-label">Jam</label>
              <input value="{{$data->jam}}" name="jam" type="time" class="form-control" id="jam" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="suhu" class="form-label">Suhu</label>
              <input value="{{$data->suhu}}" name="suhu" type="suhu" class="form-control" id="suhu" aria-describedby="emailHelp">
            </div>
            
            <button type="submit" class="btn btn-warning">Submit</button>
          </form>
</div>
@endsection
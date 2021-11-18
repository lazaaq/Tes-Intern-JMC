@extends('layouts.main')
@section('title', 'Kabupaten | Tambah')
@section('content')
<div class="container mt-5">
    <div class="kabupaten-body" id="kabupaten-body">
        <h1>Input Kabupaten</h1>
        <form method="POST" action="{{route('kabupaten.store')}}">
            @csrf
            <div class="mb-3 col-sm-6">
                <label for="name" class="form-label">Nama Kabupaten</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3 col-sm-6">
                <label for="provinsi_id" class="form-label">Nama Provinsi</label>
                <select class="form-select" id="provinsi_id" name="provinsi_id">
                    <option selected>Pilih Provinsi</option>
                    @foreach($provinsis as $provinsi)
                    <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-sm-6">
                <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk</label>
                <input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" required>
            </div>
            <div class="button">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
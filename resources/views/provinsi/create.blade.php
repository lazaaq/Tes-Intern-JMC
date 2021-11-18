@extends('layouts.main')
@section('title', 'Provinsi | Tambah')
@section('content')
<div class="container mt-5">
    <div class="provinsi-body" id="provinsi-body">
        <h1>Input Provinsi</h1>
        <form method="POST" action="{{route('provinsi.store')}}">
            @csrf
            <div class="mb-3 col-sm-6">
                <label for="name" class="form-label">Nama Provinsi</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="button">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="/provinsi">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
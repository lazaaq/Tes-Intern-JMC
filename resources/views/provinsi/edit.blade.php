@extends('layouts.main')
@section('title', 'Provinsi | Edit')
@section('content')
<div class="container mt-5">
    <h1>Edit Provinsi</h1>
    <form method="POST" action="{{route('provinsi.update', $provinsi->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3 col-sm-6">
            <label for="name" class="form-label">Nama Provinsi</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$provinsi->name}}" required>
        </div>
        <div class="button">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/provinsi" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection
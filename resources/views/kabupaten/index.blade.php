@extends('layouts.main')

@section('title', 'Provinsi')

@section('content')
<div class="container">
    @if(session()->has('kabupaten_added'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('kabupaten_added') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('kabupaten_updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('kabupaten_updated') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('kabupaten_destroyed'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('kabupaten_destroyed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="create">
        <a href="{{route('kabupaten.create')}}" class="btn btn-primary mt-5">Tambah Kabupaten</a>
    </div>
    <div class="search mt-3">
        <form action="/kabupaten" class="w-100 row">
            <h3>SEARCHING</h3>
            <div class=" " style="width: 50%!important;">
                <label for="search" class="form-label">Search Based Kabupaten's Name</label>
                <input type="text" class="form-control" placeholder="Search" name="search" id="search" value="{{ request('search') ?? '' }}">
            </div>
            <div class="col-sm-6" style="width: 50%!important;">
                <label for="provinsi_search" class="form-label">Search Based Provinsi's Name</label>
                <select class="form-select col-12" name="provinsi_search" id="provinsi_search">
                    <option selected value="">Semua</option>
                    @foreach($provinsis as $provinsi)
                    <option value="{{$provinsi->id}}" @if(request('provinsi_search')==$provinsi->id) selected @endif>{{$provinsi->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kabupaten</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Jumlah Penduduk</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kabupatens as $kabupaten)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$kabupaten->name}}</td>
                <td>{{$kabupaten->provinsi->name}}</td>
                <td>{{$kabupaten->jumlah_penduduk}}</td>
                <td class="d-flex">
                    <a href="{{route('kabupaten.edit', $kabupaten->id)}}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{route('kabupaten.destroy', $kabupaten->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="javascript:void(0);" onclick="printPage()">Print This Page</a>

    <script type="text/javascript">
        function printPage() {
            var tableData = '<table border="1">' + document.getElementsByTagName('table')[0].innerHTML + '</table>';
            var data = '<button onclick="window.print()">Print this page</button>' + tableData;
            myWindow = window.open('', '', 'width=800,height=600');
            myWindow.innerWidth = screen.width;
            myWindow.innerHeight = screen.height;
            myWindow.screenX = 0;
            myWindow.screenY = 0;
            myWindow.document.write(data);
            myWindow.focus();
        };
    </script>
</div>
@endsection
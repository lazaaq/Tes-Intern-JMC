@extends('layouts.main')

@section('title', 'Provinsi')

@section('content')
<div class="container">
    @if(session()->has('provinsi_added'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('provinsi_added') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('provinsi_updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('provinsi_updated') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('provinsi_destroyed'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('provinsi_destroyed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="create mt-5">
        <a href="{{route('provinsi.create')}}" class="btn btn-primary">Tambah Provinsi</a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Jumlah Penduduk Per Provinsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($provinsis as $provinsi)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$provinsi->name}}</td>
                <td>{{$provinsi->jumlah_penduduk}}</td>
                <td class="d-flex">
                    <a href="{{route('provinsi.edit', $provinsi->id)}}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{route('provinsi.destroy', $provinsi->id)}}" method="POST">
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
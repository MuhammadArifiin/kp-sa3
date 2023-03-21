@extends('layouts.adminApp')

@section('content')
<div class="title my-2">
    <h1>Daftar Mahasiswa</h1>
</div>

<div class="searchbox my-2">
    <form action="{{ url('/admin/mahasiswa/search') }}" method="GET">
        <div class="col-md-3 d-flex">
            <input type="text" name="cari" class="form-control me-1" placeholder="Cari Antrean .."
                value="{{ old('cari')}}">
            <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="CARI">
        </div>
    </form>
</div>

<div class="import my-2">
    <form role="form" method="post" action="{{ url('/admin/mahasiswa/import') }}" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" name="file" id="exampleInputFile">
                <p class="help-block">Silakan import file excel data mahasiswa.</p>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-md">Import</button>
        </div>
        {{-- <a class="btn btn-primary float-end" href="{{ url('/admin/export') }}">Export User Data</a> --}}
    </form>
</div>

<div class="datatable my-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>HP</th>
                <th>Alamat</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>Ukuran</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $dt)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $dt->nim }}</td>
                <td>{{ $dt->nama }}</td>
                <td>{{ $dt->email }}</td>
                <td>{{ $dt->hp }}</td>
                <td>{{ $dt->alamat }}</td>
                <td>{{ $dt->fakultas }}</td>
                <td>{{ $dt->jurusan }}</td>
                <td>{{ $dt->size }}</td>
                <td>
                    {{-- <a class="btn btn-warning" href="{{ url('/admin/users/'.$dt->email.'/edit') }}">Edit</a> --}}
                    {{-- <form onsubmit="return confirm('Data akan dihapus?')" class='d-inline'
                        action="{{ url('/admin/users/'. $dt->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-end my-2">
    {!! $data->links() !!}
</div>
@endsection
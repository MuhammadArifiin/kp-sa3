@extends('layouts.adminApp')

@section('content')
<div class="title my-2">
    <h1>Daftar Jurusan</h1>
</div>

<div class="searchbox my-2">
    <form action="{{ url('/admin/jurusan/search') }}" method="GET">
        <div class="col-md-3 d-flex">
            <input type="text" name="cari" class="form-control me-1" placeholder="Cari Jurusan .."
                value="{{ old('cari') }}">
            <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="CARI">
        </div>
    </form>
</div>

<div class="datatable my-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Jurusan</th>
                <th>Jurusan</th>
                <th>Kode Fakultas</th>
                <th>Fakultas</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $dt)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $dt->kodeJurusan }}</td>
                <td>{{ $dt->jurusan }}</td>
                <td>{{ $dt->kodeFakultas }}</td>
                <td>{{ $dt->fakultas }}</td>
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
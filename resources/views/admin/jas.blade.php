@extends('layouts.adminApp')

@section('content')
<div class="title my-2">
    <h1>Daftar Jas Almamater</h1>
</div>

<div class="addJas my-2">
    <a href="{{ url('/admin/jas/new') }}" class="btn btn-md btn-success mb-3">Tambah</a>
</div>

<div class="datatable my-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Ukuran</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $dt)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $dt->size }}</td>
                <td>{{ $dt->stok }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ url('/admin/editJas', $dt->id_jas) }}">Edit</a>
                    <form onsubmit="return confirm('Data akan dihapus?')" class='d-inline'
                        action="{{ url('/admin/jas', $dt->id_jas) }}" method="get">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
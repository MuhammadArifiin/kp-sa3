@extends('layouts.adminApp')

@section('content')
<div class="title my-2">
    <h1>Batas Konfirmasi Jas</h1>
</div>

<div class="datatable my-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Buka Konfirmasi</th>
                <th>Tanggal Tutup Konfirmasi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $dt)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $dt->start }}</td>
                <td>{{ $dt->end }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ url('/admin/editLimitConfirm', $dt->id) }}">Edit</a>
                   {{-- @php dd($data); @endphp --}}
                    {{-- <form onsubmit="return confirm('Data akan dihapus?')" class='d-inline'
                        action="{{ url('/admin/limit-confirm', $dt->id) }}" method="get">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.adminApp')

@section('content')
<div class="title my-2">
    <h1>Daftar Fakultas</h1>
</div>

<div class="datatable my-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Fakultas</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $dt)
            <tr>
                <td>{{ $i++ }}</td>
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
@endsection
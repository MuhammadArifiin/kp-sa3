@extends('layouts.adminApp')

@section('content')
<div>
    <div class="title my-2">
        <h1>Daftar User</h1>
        <form action="{{ url('/admin/users/search') }}" method="GET">
            <div class="col-md-3 d-flex my-2">
                <input type="text" name="cari" class="form-control me-1" placeholder="Cari Antrean .."
                    value="{{ old('cari') }}">
                <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="CARI">
            </div>
        </form>
    </div>
    {{-- <form role="form" method="post" action="{{ url('/admin/import') }}" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" name="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-md">Import</button>
        </div>
        <a class="btn btn-primary float-end" href="{{ url('/admin/export') }}">Export User Data</a>
    </form> --}}
    <div class="datatable my-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Konfirmasi Pengguna</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($data as $dt)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $dt->name }}</td>
                    <td>{{ $dt->email }}</td>
                    <td>{{ $dt->confirmJas }}</td>
                    <td>{{ $dt->type }}</td>
                    <td>
                        <form onsubmit="return confirm('Update Konfirmasi Jas User?')" class='d-inline' action="{{ url('/admin/editUser/update', $dt->id) }}"
                            method="post">
                            @csrf
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                        <form onsubmit="return confirm('Data akan dihapus?')" class='d-inline'
                            action="{{ url('/deleteuser', $dt->id) }}" method="get">
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

    <div class="d-flex justify-content-end my-2">
        {!! $data->links() !!}
    </div>
</div>
@endsection
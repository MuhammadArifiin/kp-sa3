@extends('layouts.adminApp')

@section('content')


<div class="title my-2">
    <h1>Daftar Antrean</h1>
    <div class="searchbox my-2">
        <form action="{{ url('/admin/queue/search') }}" method="GET">
            <div class="col-md-3 d-flex">
                <input type="text" name="cari" class="form-control me-1" placeholder="Cari Antrean .."
                    value="{{ old('cari')}}">
                <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="CARI">
            </div>
        </form>
    </div>
</div>

<div class="datatable my-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Antrian</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($dataAntrian as $dt)
            @if($dt->keterangan_id === 0)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $dt->kode }}</td>
                <td>{{ $dt->nim }}</td>
                <td>{{ $dt->nama }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $i }}" data-bs-whatever="@mdo">Confirm</button>
                    <form onsubmit="return confirm('Data akan dihapus?')" class='d-inline'
                        action="{{ url('/admin/queue/delete', $dt->id_antrian) }}" method="get">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @php $i++ @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@php $i=1 @endphp
@foreach ($dataAntrian as $dt)
@if($dt->keterangan_id === 0)
<div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/admin/queue/confirmQ') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pengambilan Jas Almamater</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="konfirmasi" class="form-label" name="konfirmasi">Konfirmasi</label>
                        <select id="keterangan_id" class="form-select" name="keterangan_id">
                            @foreach ($keterangan as $ket)
                            <option value="{{ $ket->id }}" {{ $ket->id == $dt->keterangan_id ? "selected" : "" }}>{{
                                $ket->status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pengambil" class="form-label">Diambil Oleh</label>
                        <input type="text" class="form-control" id="pengambil" name="pengambil"
                            placeholder="Silakan isi NIM pengambil jika pengambilan jas diwakilkan">
                    </div>
                </div>
                <input type="hidden" name="id_antrian" value="{{ $dt->id_antrian }}">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@php $i++ @endphp
@endif

@endforeach

<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
    </div>
</div>

<div class="d-flex justify-content-end">
    {!! $dataAntrian->links() !!}
</div>
@endsection
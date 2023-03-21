@extends('layouts.adminApp')

@section('content')


<div class="title my-2">
    <h1>Daftar Antrean Terkonfirmasi</h1>
</div>



<div class="row">
    <div class="col-md-12 justify-content-start">
        <form action="{{ url('/admin/queue/search') }}" method="GET">
            <div class="col-md-3 d-flex my-2">
                <input type="text" name="cari" class="form-control me-1" placeholder="Cari Antrean .."
                    value="{{ old('cari') }}">
                <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="CARI">
            </div>
        </form>
        <div class="col-md-12 d-flex justify-content-end my-2">
            <a class="btn btn-success float-end me-1" href="{{ url('/admin/qdone/export') }}">Export Excel</a>
            <a class="btn btn-danger float-end" href="{{ url('/admin/generatePDF') }}">Export PDF</a>
        </div>
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
                <th>Status</th>
                <th>Pengambil</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($dataAntrian as $dt)
            @if($dt->keterangan_id != 0)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $dt->kode }}</td>
                <td>{{ $dt->nim }}</td>
                <td>{{ $dt->nama }}</td>
                <td>{{ $dt->status }}</td>
                <td>{{ $dt->pengambil }}</td>
            </tr>
            @php $i++ @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-end my-2">
    {!! $dataAntrian->links() !!}
</div>
@endsection
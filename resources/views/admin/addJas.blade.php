@extends('layouts.adminApp')

@section('content')
<div class="title my-2">
    <h1>Tambah Data Jas Almamater</h1>
</div>

<div class="box my-2">
    <div class="row">
        <div class="col-md-12">
            <form class="row g-3" action="{{ url('/admin/jas') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="size" class="form-label">Ukuran</label>
                    <input type="text" class="form-control" id="size" name="size">
                </div>
                <div class="col-md-6">
                    <label for="stok" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="stok" name="stok">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
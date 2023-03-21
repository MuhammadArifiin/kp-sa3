@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title fw-bold lh-1 mb-3 align-items-center text-center">Edit Data Jas Almamater</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="text-center">Silakan masukkan ukuran jas almamater yang diinginkan, harap periksa kembali sebelum melakukan submit data.
            </p>
        </div>
    </div>
    <div class="box pt-4">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <form class="row g-3" action="{{ url('/q/update', $data->id) }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="{{ $data->nim }}">
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}">
                    </div>
                    <div class="col-12">
                        <label for="hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="hp" name="hp" value="{{ $data->hp }}">
                    </div>
                    <div class="col-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
                    </div>
                    <div class="col-md-12">
                        <label for="fakultas" class="form-label" name="fakultas">Fakultas</label>
                        <select id="fakultas" class="form-select" name="fakultas">
                            <option value="" selected>Choose...</option>
                            @foreach ($fakultas as $fakultas)
                            <option value="{{ $fakultas->id_fakultas }}">{{ $fakultas->fakultas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="jurusan" class="form-label" name="jurusan">Jurusan</label>
                        <select id="jurusan" class="form-select" name="jurusan">
                            <option value="" selected>Choose...</option>
                            @foreach ($jurusan as $jurusan)
                            <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="size" class="form-label" name="size">Size</label>
                        <select id="size" class="form-select" name="size">
                            <option value="" selected>Choose...</option>
                            @foreach ($jas as $jas)
                            @if ($jas->stok > 0 )
                            <option value="{{ $jas->id_jas }}">{{ $jas->size }}</option>
                            @else
                            <option value="{{ $jas->id_jas }}" disabled>{{ $jas->size }} (Stok Habis)</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="hidden" class="form-control" id="status" name="status" value="{{ $data->status }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
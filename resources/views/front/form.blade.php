@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h1 class="fw-bold">Formulir Ukuran Jas Almamater</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque ipsum nulla cumque nemo, reprehenderit
                eveniet
                ex, earum cupiditate numquam libero tenetur dolores iste minus asperiores amet sunt tempore nam quas.
            </p>
        </div>
    </div>

    <div class="box pt-4">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <form class="row g-3" action="{{ url('/store') }}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@mail.com">
                    </div>
                    <div class="col-12">
                        <label for="hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="hp" name="hp" placeholder="08123456789">
                    </div>
                    <div class="col-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            placeholder="Apartment, studio, or floor">
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
                            <option value="{{ $jas->id_jas }}">{{ $jas->size }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div> --}}
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
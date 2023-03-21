@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @include('front.profileside')

        <div class="col-md-9">
            <form class="row g-3">
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="inputAddress" placeholder="****">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="inputAddress" placeholder="****">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="inputAddress" placeholder="****">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        {{-- <div class="col-md-9">
            <form class="row g-3" action="{{ url('/user/profile/update') }}" method="POST">
                @csrf
                @if (auth()->user()->type != 1)
                @foreach ($data as $dt)
                @if ($dt->nim == auth()->user()->nim)
                <div class="col-md-6">
                    <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ $dt->nim }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $dt->nama }}" disabled>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $dt->email }}" disabled>
                </div>
                <div class="col-12">
                    <label for="hp" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $dt->hp }}" disabled>
                </div>
                <div class="col-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $dt->alamat }}"
                        disabled>
                </div>
                <div class="col-md-6">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <input type="text" class="form-control" id="fakultas" name="fakultas" value="{{ $dt->fakultas }}"
                        disabled>
                </div>
                <div class="col-md-6">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $dt->jurusan }}"
                        disabled>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                @endif
                @endforeach
                @endif
            </form>
        </div> --}}

    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
@php
$data = $dataSend['data'];
$antre = $dataSend['antrian'];
@endphp

<div class="container my-4">
    <h1 class="title fw-bold lh-1 mb-3 align-items-center text-center">Formulir Ukuran Jas Almamater</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="text-center">Sebelum melakukan konfirmasi, harap terlebih dulu memastikan bahwa semua data sudah sesuai. Pengguna bisa melakukan edit data apabila ada data yang tidak sesuai dan melakukan konfirmasi setelahnya. 
                Pengguna yang sudah melakukan konfirmasi tidak bisa lagi melakukan edit data sebab data sudah masuk ke dalam database daftar antrean. Silakan periksa kartu antrean untuk melihat jadwal pengambilan jas almamater.
            </p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card" style="width: 70%;">
            <div class="card-body">
                <div class="col-md-12 pt-3 pb-5">
                    @php $i=1 @endphp
                    @if (auth()->user()->type != 1)
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="{{ $data->nim }}"
                                disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}"
                                disabled>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}"
                                disabled>
                        </div>
                        <div class="col-12">
                            <label for="hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="hp" name="hp" value="{{ $data->hp }}" disabled>
                        </div>
                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $data->alamat }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="fakultas" class="form-label">Fakultas</label>
                            <input type="text" class="form-control" id="fakultas" name="fakultas"
                                value="{{ $data->fakultas }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                value="{{ $data->jurusan }}" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="jas" class="form-label">Ukuran Jas</label>
                            <input type="text" class="form-control" id="jas" name="jas" value="{{ $data->size }}"
                                disabled>
                        </div>
                        <div class="col-12">
                    </form>
                </div>
                <a @php echo auth()->user()->confirmJas != 0 ? 'style="pointer-events: none;"' : '';
                    @endphp class="btn btn-warning" href="{{ url('/edit', $data->id) }}">Edit</a>
                <form onsubmit="return confirm('Konfirmasi Ukuran?')" class='d-inline'
                    action="{{ url('/confirm', $data->id) }}" method="post">
                    @csrf
                    <button @php echo auth()->user()->confirmJas != 0 ? 'disabled' : '';
                        @endphp class="btn btn-primary" type="submit">Confirm</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row justify-content-center">
        <h1 class="title fw-bold lh-1 mb-3 align-items-center text-center">Kartu Antrean Ambil Almamater</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="text-center">Antrean hanya akan muncul di laman admin sesuai dengan tanggal pengambilan sehingga antrean di luar tanggal pengambilan tidak akan muncul di laman admin dan tidak bisa dikonfirmasi. Bagi yang mahasiswa yang ingin mengambil bisa wajib membawa surat registrasi begitu pula dengan mahasiswa yang pengambilan jas almamaternya diambilkan. <br> <br> Jika sudah lewat dari tanggal pengambilan, silakan periksa kembali tanggal pengambilan baru yang sudah diupdate oleh sistem.
                </p>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card mb-3 mt-3" style="padding:0;width:100%;height:auto;shadwo:left;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                @if (auth()->user()->type != 1 && $antre->index > 0)
                <div class="row no-gutters">
                    <div class="col-md-4 m-auto">
                        <img src="{{ asset('/assets/queue.png') }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Kartu Antrean Ambil Almamater</h3>
                            <hr>
                            <p class="card-text">Nomor Antrean : {{ $antre->index }}</p>
                            <p class="card-text">Kode Antrean : {{ $antre->kode }}</p>
                            <p class="card-text">NIM : {{ $data->nim }}</p>
                            <p class="card-text">Nama : {{ $data->nama }}</p>
                            <p class="card-text">Ukuran Jas : {{ $data->size }}</p>
                            <p class="card-text">Tanggal Pengambilan : {{ $antre->pickupDate }}</p>
                            <p class="card-text">Silakan mendatangi loket yang sesuai.</p>
                            <p class="card-text"><small class="text-muted">Last updated at {{ $antre->updated_at
                                    }}</small></p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
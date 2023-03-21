@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title fw-bold lh-1 mb-3 align-items-center text-center py-3">Sistem Antrian Ambil Alamamater
    </h1>
    <div class="row justify-content-center">
        <div class="card" style="width: 70%;">
            <div class="d-flex justify-content-center m-4">
                <img class="wline m-3center" src="{{ asset('/assets/waitingline.jpg') }}"
                    style="padding:0;width:50%;height:auto;shadwo:left;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"
                    alt="">
            </div>
            <div class="card-body">
                <p class="card-text text-center">Sistem ini merupakan sebuah sistem yang bertujuan untuk mencetak antrian pengambilan jas
                    almamater Universitas Palangka
                    Raya. Sistem ini dibuat sebagai langkah pertama dalam pendistribusian jas almamater yang mencakup
                    pendataan jas almamater, antrean pengambilan serta pelaporan baik itu menggunakan pdf, excel, maupun
                    melalui chart di laman admin.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
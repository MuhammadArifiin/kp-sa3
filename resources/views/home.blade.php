@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if(auth()->user()->is_admin == 1)
                    <a href="{{url('admin/routes')}}">Admin</a>
                    @else
                    <div class=”panel-heading”>Normal User</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ asset('/assets/queue.png') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500"
                loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Sistem Antrian Ambil Alamamater</h1>
            <p class="lead">Sistem ini merupakan sebuah sistem yang bertujuan untuk mencetak antrian pengambilan jas almamater Universitas Palangka
            Raya</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{ url('/about') }}" class="btn btn-primary btn-lg px-4 me-md-2" role="button">Get Started</a>
                {{-- <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Login</button> --}}
            </div>
        </div>
    </div>
</div>

@endsection
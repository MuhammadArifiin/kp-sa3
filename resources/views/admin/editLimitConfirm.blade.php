@extends('layouts.adminApp')

@section('content')
<div class="title my-2">
    <h1>Edit Batas Konfirmasi Jas</h1>
</div>

{{-- @foreach ($data as $data) --}}
<div class="box my-2">
    <div class="row">
        <div class="col-md-12">
            <form class="row g-3" action="{{ url('/admin/editLimitConfirm/update', $data->id) }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="start" class="form-label">Tanggal Buka</label>
                    <input type="date" class="form-control" id="start" name="start" value="{{ $data->start }}">
                </div>
                <div class="col-md-6">
                    <label for="end" class="form-label">Tanggal Tutup</label>
                    <input type="date" class="form-control" id="end" name="end" value="{{ $data->end }}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- @endforeach --}}
@endsection
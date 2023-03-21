@extends('layouts.adminApp')

@section('content')
<div class="title my-2">
    <h1>Edit Data User</h1>
</div>

{{-- @foreach ($data as $data) --}}
<div class="box my-2">
    <div class="row">
        <div class="col-md-12">
            <form class="row g-3" action="{{ url('/admin/editUser/update', $data->id) }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="confirmJas" class="form-label">Ukuran</label>
                    <input type="number" class="form-control" id="confirmJas" name="confirmJas" value="{{ $data->confirmJas }}">
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
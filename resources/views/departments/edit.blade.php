@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0 col-md-6 mx-auto">
    <div class="card-body p-4">
        <h4 class="fw-bold mb-3">Edit Departemen</h4>
        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Departemen</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $department->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
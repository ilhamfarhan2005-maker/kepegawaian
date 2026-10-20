@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0 col-md-8 mx-auto">
    <div class="card-body p-4">
        <h4 class="fw-bold mb-3">Edit Data Pegawai</h4>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Pegawai</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $employee->name) }}">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Departemen</label>
                <select name="department_id" class="form-select @error('department_id') is-invalid @enderror">
                    <option value="">-- Pilih Departemen --</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ old('department_id', $employee->department_id) == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                    @endforeach
                </select>
                @error('department_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $employee->position) }}">
                @error('position') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gaji (IDR)</label>
                    <input type="number" step="0.01" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary', $employee->salary) }}">
                    @error('salary') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Bergabung</label>
                    <input type="date" name="joined_at" class="form-control @error('joined_at') is-invalid @enderror" value="{{ old('joined_at', $employee->joined_at) }}">
                    @error('joined_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-flex gap-2 mt-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
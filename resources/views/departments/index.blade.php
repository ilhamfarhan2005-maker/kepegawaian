@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Daftar Departemen</h3>
    <a href="{{ route('departments.create') }}" class="btn btn-primary btn-sm">+ Tambah Departemen</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Departemen</th>
                        <th>Jumlah Pegawai</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $dept)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dept->name }}</td>
                            <td><span class="badge bg-secondary">{{ $dept->employees_count }} Pegawai</span></td>
                            <td class="text-center">
                                <a href="{{ route('departments.edit', $dept->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Belum ada data departemen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
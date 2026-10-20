@extends('layouts.app')

@section('content')
<div class="row align-items-center justify-content-between mb-4 gy-2">
    <div class="col-auto">
        <h3 class="fw-bold mb-1" style="letter-spacing: -0.5px;">Daftar Pegawai</h3>
        <p class="text-secondary small mb-0">Kelola informasi seluruh anggota pegawai dan penempatan divisinya</p>
    </div>
    <div class="col-auto">
        <a href="{{ route('employees.create') }}" class="btn btn-3d-primary px-4 py-2">
            <i class="bi bi-person-plus-fill me-1"></i> Tambah Pegawai
        </a>
    </div>
</div>

<div class="card card-3d border-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-modern table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th>Nama Lengkap</th>
                    <th>Departemen</th>
                    <th>Posisi / Jabatan</th>
                    <th>Gaji Bulanan</th>
                    <th>Tgl Bergabung</th>
                    <th width="150" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $emp)
                    <tr>
                        <td class="text-center text-muted fw-semibold">{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center fw-bold text-primary shadow-sm" style="width: 38px; height: 38px;">
                                    {{ strtoupper(substr($emp->name, 0, 1)) }}
                                </div>
                                <div class="fw-bold text-dark">{{ $emp->name }}</div>
                            </div>
                        </td>
                        <td>
                            <span class="badge-dept">
                                <i class="bi bi-briefcase me-1"></i> {{ $emp->department->name ?? '-' }}
                            </span>
                        </td>
                        <td class="text-secondary fw-semibold">{{ $emp->position }}</td>
                        <td class="fw-bold text-dark">
                            Rp {{ number_format($emp->salary, 0, ',', '.') }}
                        </td>
                        <td class="text-secondary">
                            <i class="bi bi-calendar3 me-1 small"></i> {{ \Carbon\Carbon::parse($emp->joined_at)->format('d M Y') }}
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-light btn-sm rounded-3 border shadow-sm text-primary px-2" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pegawai ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-light btn-sm rounded-3 border shadow-sm text-danger px-2" title="Hapus">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                            Belum ada pegawai yang terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
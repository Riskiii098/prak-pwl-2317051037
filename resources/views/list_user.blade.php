@extends('layouts.app')

@section('content')
<div class="user-list-container p-4">
    <h1 class="mb-4 text-primary fw-bold text-center">📋 Daftar Pengguna</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('user.create') }}" class="btn btn-gradient-primary fw-semibold shadow-sm">
            ➕ Tambah Pengguna
        </a>
    </div>

    <table class="table table-bordered table-striped table-hover text-center align-middle shadow-sm rounded">
        <thead class="table-primary text-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td class="fw-semibold text-start ps-4">{{ $user->nama }}</td>
                    <td>{{ $user->nim }}</td>
                    <td>{{ $user->nama_kelas ?? '-' }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-edit me-2 shadow-sm">
                            ✏️ Edit
                        </a>

                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete shadow-sm"
                                onclick="return confirm('Yakin ingin hapus {{ $user->nama }}?')">
                                🗑️ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-muted">Tidak ada data pengguna</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- 🎉 Notifikasi SweetAlert --}}
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 2000,
                position: 'center',
                background: 'rgba(255,255,255,0.95)',
                color: '#155724'
            });
        });
    </script>
@elseif(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session("error") }}',
                showConfirmButton: false,
                timer: 2000,
                position: 'center',
                background: 'rgba(255,255,255,0.95)',
                color: '#721c24'
            });
        });
    </script>
@endif

{{-- CDN SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
.user-list-container {
    background: linear-gradient(to bottom right, #ffffff, #f0f7ff);
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.1);
}

/* 🌟 Tombol Tambah */
.btn-gradient-primary {
    background: linear-gradient(135deg, #007bff, #00b4d8);
    border: none;
    color: white;
    border-radius: 50px;
    padding: 10px 20px;
    transition: 0.3s;
}
.btn-gradient-primary:hover {
    transform: scale(1.05);
    background: linear-gradient(135deg, #0056b3, #0077b6);
    box-shadow: 0 0 12px rgba(0, 123, 255, 0.4);
}

/* ✏️ Tombol Edit */
.btn-edit {
    background: rgba(255, 193, 7, 0.2);
    color: #ffb300;
    border: 2px solid #ffb300;
    border-radius: 12px;
    padding: 6px 14px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-edit:hover {
    transform: translateY(-2px) scale(1.05);
    color: #fff;
    background: linear-gradient(135deg, #ffc107, #ffb703);
}

/* 🗑 Tombol Delete */
.btn-delete {
    background: rgba(220, 53, 69, 0.2);
    color: #e63946;
    border: 2px solid #e63946;
    border-radius: 12px;
    padding: 6px 14px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-delete:hover {
    transform: translateY(-2px) scale(1.05);
    color: #fff;
    background: linear-gradient(135deg, #e63946, #ff5c8a);
}

/* Hover tabel */
.table-hover tbody tr:hover {
    background-color: #e3f2fd !important;
    transition: background-color 0.3s;
}
</style>
@endsection

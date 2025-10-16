@extends('layouts.app')

@section('content')
<div class="mk-list-container p-4 shadow-sm rounded-4">
    <h1 class="text-primary fw-bold text-center mb-4">📘 Daftar Mata Kuliah</h1>

    <div class="text-end mb-3">
        <a href="{{ route('matakuliah.create') }}" class="btn btn-gradient-primary fw-semibold shadow-sm">
            ➕ Tambah Mata Kuliah
        </a>
    </div>

    <table class="table table-hover align-middle text-center shadow-sm bg-white rounded-3 overflow-hidden">
        <thead class="table-primary text-dark">
            <tr>
                <th>ID</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($matakuliah as $mk)
                <tr>
                    <td>{{ $mk->id }}</td>
                    <td class="text-start ps-4 fw-semibold">{{ $mk->nama_mk }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>
                        <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-edit me-2 shadow-sm">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-delete shadow-sm"
                                onclick="return confirm('Yakin ingin menghapus {{ $mk->nama_mk }}?')">
                                🗑️ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-muted">Tidak ada data mata kuliah.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- ✅ Notifikasi SweetAlert tengah --}}
@if(session('success') || session('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: '{{ session("success") ? "success" : "error" }}',
        title: '{{ session("success") ? "Berhasil!" : "Gagal!" }}',
        text: '{{ session("success") ?? session("error") }}',
        showConfirmButton: false,
        timer: 2000,
        position: 'center',
        background: 'rgba(255,255,255,0.95)',
        color: '{{ session("success") ? "#155724" : "#721c24" }}',
        iconColor: '{{ session("success") ? "#28a745" : "#dc3545" }}',
        showClass: {
            popup: 'animate__animated animate__zoomIn'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    });
});
</script>
@endif

<style>
.mk-list-container {
    background: linear-gradient(to bottom right, #ffffff, #eef7ff);
    max-width: 950px;
    margin: 40px auto;
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

/* Tombol Tambah */
.btn-gradient-primary {
    background: linear-gradient(135deg, #007bff, #00b4d8);
    border: none;
    color: white;
    border-radius: 30px;
    padding: 10px 20px;
    transition: 0.3s;
}
.btn-gradient-primary:hover {
    transform: scale(1.05);
    background: linear-gradient(135deg, #0056b3, #0077b6);
}

/* Tombol Edit */
.btn-edit {
    background: #fff3cd;
    border: 2px solid #ffb300;
    color: #ff9800;
    border-radius: 12px;
    padding: 6px 14px;
    transition: all 0.3s;
}
.btn-edit:hover {
    background: linear-gradient(135deg, #ffb703, #ff9800);
    color: white;
    transform: translateY(-2px);
}

/* Tombol Delete */
.btn-delete {
    background: #fde2e4;
    border: 2px solid #dc3545;
    color: #e63946;
    border-radius: 12px;
    padding: 6px 14px;
    transition: all 0.3s;
}
.btn-delete:hover {
    background: linear-gradient(135deg, #e63946, #ff5c8a);
    color: white;
    transform: translateY(-2px);
}

/* Hover tabel */
.table-hover tbody tr:hover {
    background-color: #f0f8ff !important;
    transition: 0.3s;
}
</style>
@endsection

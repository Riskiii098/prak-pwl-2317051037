@extends('layouts.app')

@section('content')
<div class="mk-edit-container p-4 shadow-lg rounded-4">
    <h2 class="text-center text-primary fw-bold mb-4">✏️ Edit Mata Kuliah</h2>

    <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST" class="mx-auto" style="max-width:600px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_mk" class="form-label fw-semibold">Nama Mata Kuliah</label>
            <input type="text" name="nama_mk" id="nama_mk" class="form-control rounded-pill shadow-sm"
                   value="{{ old('nama_mk', $matakuliah->nama_mk) }}" required>
        </div>

        <div class="mb-4">
            <label for="sks" class="form-label fw-semibold">SKS</label>
            <input type="number" name="sks" id="sks" class="form-control rounded-pill shadow-sm"
                   value="{{ old('sks', $matakuliah->sks) }}" min="1" max="6" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-save me-2 shadow-sm">💾 Simpan</button>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-cancel shadow-sm">↩️ Kembali</a>
        </div>
    </form>
</div>

{{-- ✅ SweetAlert tengah --}}
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
        iconColor: '{{ session("success") ? "#28a745" : "#dc3545" }}'
    });
});
</script>
@endif

<style>
.mk-edit-container {
    background: linear-gradient(to bottom right, #ffffff, #eaf4ff);
    max-width: 700px;
    margin: 50px auto;
    border-radius: 20px;
}

/* Tombol Simpan */
.btn-save {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    border-radius: 30px;
    padding: 10px 25px;
    border: none;
    transition: 0.3s;
}
.btn-save:hover {
    transform: scale(1.05);
    background: linear-gradient(135deg, #198754, #1b8a3d);
}

/* Tombol Kembali */
.btn-cancel {
    background: linear-gradient(135deg, #6c757d, #adb5bd);
    color: white;
    border-radius: 30px;
    padding: 10px 25px;
    transition: 0.3s;
}
.btn-cancel:hover {
    transform: scale(1.05);
    background: linear-gradient(135deg, #495057, #6c757d);
}
</style>
@endsection

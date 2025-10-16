@extends('layouts.app')

@section('content')
<div class="user-edit-container p-4">
    <h1 class="mb-4 text-primary fw-bold text-center">✏️ Edit Pengguna</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST" class="shadow-sm p-4 bg-white rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label fw-semibold">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="npm" class="form-label fw-semibold">NPM</label>
            <input type="text" name="npm" id="npm" class="form-control" value="{{ $user->nim }}" required>
        </div>

        <div class="mb-3">
            <label for="kelas_id" class="form-label fw-semibold">Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-select" required>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ $user->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                ⬅️ Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                💾 Simpan Perubahan
            </button>
        </div>
    </form>
</div>

{{-- 🎉 SweetAlert --}}
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 2000,
                position: 'center'
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
                position: 'center'
            });
        });
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
.user-edit-container {
    background: linear-gradient(to bottom right, #ffffff, #eaf4ff);
    border-radius: 15px;
    max-width: 700px;
    margin: 40px auto;
}
.btn-primary, .btn-secondary {
    font-weight: 500;
    transition: transform 0.2s;
}
.btn-primary:hover, .btn-secondary:hover {
    transform: scale(1.05);
}
</style>
@endsection

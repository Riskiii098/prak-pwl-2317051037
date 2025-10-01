@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4 text-primary">✨ Buat Pengguna Baru ✨</h2>

        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" required>
            </div>

            <div class="mb-3">
                <label for="npm" class="form-label fw-bold">NPM</label>
                <input type="text" id="npm" name="npm" class="form-control" placeholder="Masukkan NPM" required>
            </div>

            <div class="mb-3">
                <label for="kelas_id" class="form-label fw-bold">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Kelas --</option>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ url('/user') }}" class="btn btn-secondary">⬅ Kembali</a>
                <button type="submit" class="btn btn-primary">✅ Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h3 class="mb-0">Buat Mata Kuliah Baru</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('matakuliah.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_mk" class="form-label fw-semibold">Nama Mata Kuliah</label>
                            <input type="text" id="nama_mk" name="nama_mk" class="form-control" placeholder="Masukkan nama mata kuliah" required>
                        </div>

                        <div class="mb-4">
                            <label for="sks" class="form-label fw-semibold">SKS</label>
                            <input type="number" id="sks" name="sks" class="form-control" placeholder="Masukkan jumlah SKS" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg rounded-pill">
                                <i class="bi bi-plus-circle me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

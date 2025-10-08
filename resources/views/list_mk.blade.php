@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Daftar Mata Kuliah</h1>
        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary rounded-pill">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mata Kuliah
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col">Nama Mata Kuliah</th>
                            <th scope="col" class="text-center">SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mks as $mk)
                        <tr>
                            <td class="text-center">{{ $mk->id }}</td>
                            <td>{{ $mk->nama_mk }}</td>
                            <td class="text-center">{{ $mk->sks }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

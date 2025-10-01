@extends('layouts.app')

@section('content')
<div class="user-list-container p-4">
    <h1 class="mb-4 text-primary fw-bold">📋 Daftar Pengguna</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                    <td class="fw-semibold">{{ $user->nama }}</td>
                    <td>{{ $user->nim }}</td>
                    <td>{{ $user->nama_kelas ?? '-' }}</td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus {{ $user->nama }}?')">
                                🗑 Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-muted">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
.user-list-container {
    background-color: #f8f9fa;
    border-radius: 12px;
}
.table-hover tbody tr:hover {
    background-color: #d1ecf1 !important;
    transition: background-color 0.3s;
}
.btn-danger {
    font-weight: 500;
    transition: transform 0.2s;
}
.btn-danger:hover {
    transform: scale(1.05);
}
</style>
@endsection

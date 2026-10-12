@extends('layouts.app')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="fw-bold text-dark mb-1">Kelola Kategori Produk</h3>
        <p class="text-muted">Atur dan strukturkan kategori produk inventaris Anda secara canggih.</p>
    </div>
    <div class="col-md-4">
        <div class="card bg-primary text-white p-3 shadow-sm border-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-white-50 small">TOTAL KATEGORI</div>
                    <h2 class="fw-bold mb-0">{{ count($categories) }}</h2>
                </div>
                <i class="bi bi-tags-fill display-5 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    <!-- Form Tambah -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white fw-bold py-3">
                <i class="bi bi-plus-circle text-primary me-1"></i> Tambah Kategori Baru
            </div>
            <div class="card-body">
                <form action="/categories" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">NAMA KATEGORI</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Makanan, Laptop..." required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                        <i class="bi bi-save me-1"></i> Simpan Kategori
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <div class="col-lg-8 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white fw-bold py-3">
                <i class="bi bi-list-ul text-primary me-1"></i> Daftar Kategori Terdaftar
            </div>
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">NO</th>
                            <th>NAMA KATEGORI</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $index => $cat)
                            <tr>
                                <td class="ps-4">{{ $index + 1 }}</td>
                                <td class="fw-bold text-dark">{{ $cat->name }}</td>
                                <td class="text-center">
                                    <a href="/categories/{{ $cat->id }}/edit" class="btn btn-sm btn-outline-warning me-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                
                                    <form action="/categories/{{ $cat->id }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kategori ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">Belum ada kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
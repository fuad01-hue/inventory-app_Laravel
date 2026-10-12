@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold py-3">
                <i class="bi bi-pencil-square text-warning me-1"></i> Edit Kategori Produk
            </div>
            <div class="card-body">
                <form action="/categories/{{ $category->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">NAMA KATEGORI</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/categories" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary fw-bold">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
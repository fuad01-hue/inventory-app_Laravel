@extends('layouts.app')

@section('title', 'Manajemen Produk')

@section('content')
<div class="row">
    <!-- Form Tambah (Sekarang ada SKU-nya) -->
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white fw-bold">Tambah Produk</div>
            <div class="card-body">
                <form action="/products" method="POST">
                    @csrf
                    <select name="category_id" class="form-select mb-2" required>
                        <option value="">-- Kategori --</option>
                        @foreach($categories as $cat) <option value="{{ $cat->id }}">{{ $cat->name }}</option> @endforeach
                    </select>
                    <input type="text" name="sku" class="form-control mb-2" placeholder="Kode SKU (Unik)" required>
                    <input type="text" name="name" class="form-control mb-2" placeholder="Nama Produk" required>
                    <input type="number" name="price" class="form-control mb-2" placeholder="Harga" required>
                    <input type="number" name="stock" class="form-control mb-3" placeholder="Stok" value="0" required>
                    <button type="submit" class="btn btn-success w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="/products" method="GET" class="mb-3 d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari Produk/SKU..." value="{{ request('search') }}">
                    <select name="category_id" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="/products" class="btn btn-light">Reset</a>
                </form>
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr><th>SKU</th><th>PRODUK</th><th>HARGA</th><th>STOK</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $product->sku }}</span></td>
                            <td>{{ $product->name }} <br><small class="text-muted">{{ $product->category->name ?? '' }}</small></td>
                            <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <div class="mt-3">
                        {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
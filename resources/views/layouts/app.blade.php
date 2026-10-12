<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory P5 - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style> body { background-color: #f4f6f9; font-family: 'Segoe UI', sans-serif; } </style>
</head>
<body>
    <!-- NAVBAR GLOBAL UNTUK PINDAH HALAMAN -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-box-seam me-2"></i>INVENTORY SYSTEM
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categories*') ? 'active fw-bold text-white' : '' }}" href="/categories">
                            <i class="bi bi-tags"></i> Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products*') ? 'active fw-bold text-white' : '' }}" href="/products">
                            <i class="bi bi-box"></i> Produk
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA HALAMAN -->
    <div class="container mb-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Fakultas & Prodi</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite([])

    <style>
        body{
            background-color: #f4f6f9;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar{
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .card{
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .table{
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        footer{
            background: #0d6efd;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <i class="bi bi-mortarboard-fill me-2"></i>
                Sistem Informasi Fakultas & Prodi
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('fakultas') ? 'active fw-bold' : '' }}"
                           href="{{ url('/fakultas') }}">
                            <i class="bi bi-building me-1"></i>
                            Fakultas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('fakultas/create') ? 'active fw-bold' : '' }}"
                           href="{{ url('/fakultas/create') }}">
                            <i class="bi bi-plus-circle me-1"></i>
                            Tambah Fakultas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prodi') ? 'active fw-bold' : '' }}"
                           href="{{ url('/prodi') }}">
                            <i class="bi bi-book me-1"></i>
                            Program Studi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prodi/create') ? 'active fw-bold' : '' }}"
                           href="{{ url('/prodi/create') }}">
                            <i class="bi bi-plus-circle me-1"></i>
                            Tambah Prodi
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="container py-4">

        <!-- Alert Success -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Alert Error -->
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Validation -->
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show">
                <strong>Terjadi Kesalahan!</strong>

                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Content -->
        {{ $slot }}

    </main>

    <!-- Footer -->
    <footer class="text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">
                <i class="bi bi-c-circle"></i>
                {{ date('Y') }} Sistem Informasi Fakultas & Prodi
            </p>

            <small>Dibuat menggunakan Laravel & Bootstrap 5</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
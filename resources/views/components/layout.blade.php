<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Informasi Fakultas & Prodi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  @vite([])
  <style>
    /* Tambahan style untuk layout */
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .navbar {
        box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .navbar .nav-link {
        transition: all 0.3s ease;
        border-radius: 8px;
        margin: 0 5px;
    }
    
    .navbar .nav-link:hover {
        background-color: rgba(255,255,255,0.1);
        transform: translateY(-2px);
    }
    
    .navbar .nav-link.active {
        background-color: rgba(255,255,255,0.2);
        border-bottom: 2px solid white;
    }
    
    .navbar-toggler {
        background-color: rgba(255,255,255,0.2);
    }
    
    .navbar-toggler-icon {
        filter: brightness(0) invert(1);
    }
    
    /* Card styling */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px 15px 0 0 !important;
        padding: 20px;
    }
    
    /* Button styling */
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    
    /* Alert animation */
    .alert {
        border-radius: 10px;
        animation: slideDown 0.5s ease;
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Table styling */
    .table {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .table thead th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 15px;
    }
    
    .table tbody tr:hover {
        background-color: rgba(102, 126, 234, 0.05);
        transition: all 0.3s ease;
    }
    
    /* Footer */
    footer {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        margin-top: auto;
    }
    
    main {
        min-height: calc(100vh - 150px);
        padding-bottom: 30px;
    }
    
    /* Form styling */
    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    
    .form-label {
        font-weight: 600;
        color: #333;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg sticky-top" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <a class="navbar-brand text-white fw-bold fs-4" href="{{ url('/') }}">
            <i class="bi bi-mortarboard-fill me-2"></i>
            Sistem Informasi Fakultas & Prodi
        </a>
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('fakultas') ? 'active fw-bold' : '' }}" 
                       href="{{ url('/fakultas') }}">
                        <i class="bi bi-building me-1"></i>Fakultas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('fakultas/create') ? 'active fw-bold' : '' }}" 
                       href="{{ url('/fakultas/create') }}">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Fakultas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('prodi') ? 'active fw-bold' : '' }}" 
                       href="{{ url('/prodi') }}">
                        <i class="bi bi-book me-1"></i>Program Studi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('prodi/create') ? 'active fw-bold' : '' }}" 
                       href="{{ url('/prodi/create') }}">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Prodi
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </nav>

  <main>
    <div class="container mt-4">
        <!-- Alert Success - PERBAIKAN: typo 'sucess' menjadi 'success' -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <strong>Sukses!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Alert Error -->
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Alert Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                <strong>Validasi Gagal!</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Konten Utama -->
        {{ $slot }}
    </div>
  </main>

  <footer class="text-center py-4 mt-5">
    <div class="container">
        <p class="mb-0">
            <i class="bi bi-c-circle me-1"></i> 
            {{ date('Y') }} Sistem Informasi Fakultas & Prodi | 
            Dibangun dengan <i class="bi bi-heart-fill text-danger"></i> menggunakan Laravel
        </p>
        <small class="opacity-75">Version 1.0.0</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous"></script>
  
  <!-- Auto close alert setelah 5 detik -->
  <script>
    setTimeout(function() {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
  </script>
</body>

</html>
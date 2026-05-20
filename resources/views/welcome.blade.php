<x-layout>
    <div class="container py-5">

        {{-- HERO --}}
        <div class="text-center mb-5">

            <div class="mb-4">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-4 shadow-sm">
                    <i class="bi bi-mortarboard-fill text-primary" style="font-size: 3.5rem;"></i>
                </div>
            </div>

            <h1 class="fw-bold display-5 text-primary">
                Sistem Informasi Akademik
            </h1>

            <p class="text-muted lead">
                Kelola data Fakultas & Program Studi dengan lebih modern
            </p>

            <div class="d-flex gap-2 justify-content-center flex-wrap mt-3">

                <a href="/fakultas" class="btn btn-primary btn-lg shadow-sm">
                    <i class="bi bi-building me-1"></i> Fakultas
                </a>

                <a href="/prodi" class="btn btn-success btn-lg shadow-sm">
                    <i class="bi bi-book me-1"></i> Prodi
                </a>

                <button class="btn btn-outline-secondary btn-lg"
                        data-bs-toggle="modal"
                        data-bs-target="#aboutModal">
                    <i class="bi bi-info-circle me-1"></i> Tentang
                </button>

            </div>

        </div>

        {{-- STATS --}}
        <div class="row g-3 mb-5">

            @php
                $fak = App\Models\Fakultas::count();
                $pro = App\Models\Prodi::count();
            @endphp

            <div class="col-md-3 col-6">
                <div class="card border-0 shadow-sm text-center hover-lift">
                    <div class="card-body">
                        <i class="bi bi-building text-primary fs-2"></i>
                        <h3 class="fw-bold mt-2">{{ $fak }}</h3>
                        <small class="text-muted">Fakultas</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card border-0 shadow-sm text-center hover-lift">
                    <div class="card-body">
                        <i class="bi bi-book text-success fs-2"></i>
                        <h3 class="fw-bold mt-2">{{ $pro }}</h3>
                        <small class="text-muted">Prodi</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card border-0 shadow-sm text-center hover-lift">
                    <div class="card-body">
                        <i class="bi bi-person-badge text-info fs-2"></i>
                        <h3 class="fw-bold mt-2">{{ $fak }}</h3>
                        <small class="text-muted">Dekan</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card border-0 shadow-sm text-center hover-lift">
                    <div class="card-body">
                        <i class="bi bi-person text-warning fs-2"></i>
                        <h3 class="fw-bold mt-2">{{ $pro }}</h3>
                        <small class="text-muted">Kaprodi</small>
                    </div>
                </div>
            </div>

        </div>

        {{-- FEATURE --}}
        <div class="row g-4 mb-5">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm hover-lift h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-database text-primary fs-2"></i>
                        <h5 class="mt-3 fw-bold">CRUD Data</h5>
                        <p class="text-muted small">Kelola data fakultas & prodi</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm hover-lift h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-search text-success fs-2"></i>
                        <h5 class="mt-3 fw-bold">Pencarian</h5>
                        <p class="text-muted small">Cari data dengan cepat</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm hover-lift h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-shield-check text-info fs-2"></i>
                        <h5 class="mt-3 fw-bold">Validasi</h5>
                        <p class="text-muted small">Data lebih aman & rapi</p>
                    </div>
                </div>
            </div>

        </div>

        {{-- QUICK MENU --}}
        <div class="card border-0 shadow-sm bg-primary text-white mb-5">
            <div class="card-body text-center p-4">

                <h5 class="mb-3">Quick Menu</h5>

                <div class="d-flex gap-2 justify-content-center flex-wrap">

                    <a href="/fakultas" class="btn btn-light">
                        Fakultas
                    </a>

                    <a href="/fakultas/create" class="btn btn-light">
                        Tambah Fakultas
                    </a>

                    <a href="/prodi" class="btn btn-light">
                        Prodi
                    </a>

                    <a href="/prodi/create" class="btn btn-light">
                        Tambah Prodi
                    </a>

                </div>

            </div>
        </div>

    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="aboutModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">

                <div class="modal-header">
                    <h5 class="fw-bold">
                        <i class="bi bi-info-circle text-primary me-1"></i> Tentang
                    </h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <i class="bi bi-mortarboard-fill text-primary fs-1"></i>
                    <p class="mt-2 text-muted">
                        Sistem Informasi Akademik Laravel + Bootstrap 5
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- STYLE --}}
    <style>
        .hover-lift {
            transition: 0.3s;
        }
        .hover-lift:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
    </style>

</x-layout>
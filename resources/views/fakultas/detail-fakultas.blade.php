<x-layout>
    <div class="container mt-4">
        {{-- Alert Messages --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-x-circle-fill me-2 fs-5"></i>
                    <span>{{ session('error') }}</span>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3 border-bottom-0">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <h5 class="mb-0 fw-bold text-primary">
                            <i class="bi bi-info-circle me-2"></i>Detail Fakultas
                        </h5>
                        <p class="text-muted small mb-0 mt-1">Informasi lengkap data fakultas</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="/fakultas" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                        <a href="/fakultas/{{ $fakultas->id }}/edit" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square me-1"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                {{-- Header Info Card --}}
                <div class="alert alert-primary bg-opacity-10 border-0 mb-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-star-fill text-warning me-2"></i>
                        <span class="fw-semibold">Informasi Detail Fakultas</span>
                    </div>
                </div>

                <div class="row g-4">
                    {{-- Nama Fakultas Card --}}
                    <div class="col-md-6">
                        <div class="card bg-light border-0 h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="bi bi-building fs-4 text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Nama Fakultas</small>
                                        <h4 class="mb-0 fw-bold">{{ $fakultas->nama_fakultas }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Fakultas adalah unit organisasi di perguruan tinggi yang mengelola beberapa program studi.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Nama Dekan Card --}}
                    <div class="col-md-6">
                        <div class="card bg-light border-0 h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="bi bi-person-badge fs-4 text-success"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Nama Dekan</small>
                                        <h4 class="mb-0 fw-bold">{{ $fakultas->nama_dekan }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="bi bi-person-check me-1"></i>
                                        Dekan adalah pimpinan tertinggi di tingkat fakultas.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Program Studi Terkait --}}
                @if(isset($fakultas->prodis) && $fakultas->prodis->count() > 0)
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white py-3">
                                <h6 class="mb-0 fw-bold">
                                    <i class="bi bi-book me-2 text-primary"></i>Daftar Program Studi
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="ps-3">No</th>
                                                <th>Alias</th>
                                                <th>Nama Program Studi</th>
                                                <th>Ketua Program Studi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fakultas->prodis as $key => $prodi)
                                            <tr>
                                                <td class="ps-3">{{ $key + 1 }}</td>
                                                <td>
                                                    <span class="badge bg-info text-white">{{ $prodi->alias_prodi }}</span>
                                                </td>
                                                <td>{{ $prodi->nama_prodi }}</td>
                                                <td>{{ $prodi->nama_kaprodi }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="alert alert-info border-0">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                <span>Belum ada program studi yang terdaftar di fakultas ini.</span>
                                <a href="/prodi/create" class="btn btn-sm btn-link ms-auto">
                                    <i class="bi bi-plus-circle me-1"></i>Tambah Prodi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                {{-- Informasi Metadata --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3">
                                                <i class="bi bi-hash fs-5 text-info"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">ID Fakultas</small>
                                                <span class="fw-bold">{{ $fakultas->id }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                                <i class="bi bi-calendar-plus fs-5 text-warning"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Dibuat Pada</small>
                                                <span class="fw-bold">{{ $fakultas->created_at->format('d/m/Y H:i:s') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                                <i class="bi bi-calendar-check fs-5 text-success"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Terakhir Update</small>
                                                <span class="fw-bold">{{ $fakultas->updated_at->format('d/m/Y H:i:s') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Statistik Singkat --}}
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="text-center p-3 bg-primary bg-opacity-10 rounded-3">
                            <i class="bi bi-building fs-3 text-primary"></i>
                            <h3 class="mb-0 mt-2">{{ \App\Models\Fakultas::count() }}</h3>
                            <small class="text-muted">Total Fakultas</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-3 bg-success bg-opacity-10 rounded-3">
                            <i class="bi bi-book fs-3 text-success"></i>
                            <h3 class="mb-0 mt-2">{{ isset($fakultas->prodis) ? $fakultas->prodis->count() : 0 }}</h3>
                            <small class="text-muted">Program Studi</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-3 bg-info bg-opacity-10 rounded-3">
                            <i class="bi bi-people fs-3 text-info"></i>
                            <h3 class="mb-0 mt-2">{{ isset($fakultas->prodis) ? $fakultas->prodis->count() * 2 : 0 }}</h3>
                            <small class="text-muted">Dosen & Staff</small>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Card Footer dengan Aksi Hapus --}}
            <div class="card-footer bg-white border-top-0 py-3">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <small class="text-muted">
                        <i class="bi bi-database me-1"></i>Sistem Informasi Fakultas v1.0
                    </small>
                    <div class="d-flex gap-2">
                        <button type="button" 
                                class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                            <i class="bi bi-trash me-1"></i>Hapus Fakultas
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-3">
                <div class="modal-body text-center p-5">
                    <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex
                                align-items-center justify-content-center mb-4"
                         style="width:72px; height:72px;">
                        <i class="bi bi-exclamation-triangle fs-2 text-danger"></i>
                    </div>
                    
                    <h5 class="fw-bold mb-2">Hapus Fakultas?</h5>
                    <p class="text-muted mb-1">Anda akan menghapus fakultas:</p>
                    <p class="fw-semibold text-danger mb-4 fs-5">{{ $fakultas->nama_fakultas }}</p>
                    
                    @if(isset($fakultas->prodis) && $fakultas->prodis->count() > 0)
                        <div class="alert alert-warning py-2">
                            <i class="bi bi-exclamation-circle me-1"></i>
                            <small>Fakultas ini memiliki {{ $fakultas->prodis->count() }} program studi yang akan ikut terhapus!</small>
                        </div>
                    @endif
                    
                    <p class="text-muted small">
                        Tindakan ini <strong>tidak dapat dibatalkan</strong> dan
                        semua data terkait akan ikut terhapus.
                    </p>

                    <div class="d-flex gap-2 justify-content-center mt-4">
                        <button type="button"
                                class="btn btn-light border px-4"
                                data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-1"></i>Batal
                        </button>
                        <form action="/fakultas/{{ $fakultas->id }}" method="POST" class="d-inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger px-4">
                                <i class="bi bi-trash me-1"></i>Ya, Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script untuk Tooltip dan Auto Dismiss --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto dismiss alerts after 5 seconds
            setTimeout(function() {
                let alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    let bsAlert = bootstrap.Alert.getInstance(alert);
                    if (bsAlert) {
                        bsAlert.close();
                    }
                });
            }, 5000);
        });
    </script>
</x-layout>
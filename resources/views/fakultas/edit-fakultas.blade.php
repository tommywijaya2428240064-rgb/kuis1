<x-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0 fw-bold text-primary">
                                    <i class="bi bi-pencil-square me-2"></i>Edit Fakultas
                                </h5>
                                <p class="text-muted small mb-0 mt-1">
                                    Perbarui informasi data fakultas
                                </p>
                            </div>
                            <a href="/fakultas" class="btn btn-secondary btn-sm">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                        </div>
                    </div>
                    
                    {{-- PERBAIKAN: Alert untuk error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mx-3 mt-3" role="alert">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                                <div class="flex-grow-1">
                                    <strong>Validasi Gagal!</strong>
                                    <ul class="mb-0 mt-2 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    {{-- TAMBAHAN: Alert untuk error session --}}
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mx-3 mt-3" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-x-circle-fill me-2 fs-5"></i>
                                <span>{{ session('error') }}</span>
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                    @endif

                    {{-- TAMBAHAN: Alert untuk success session --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                                <span>{{ session('success') }}</span>
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="/fakultas/{{ $fakultas->id }}" method="POST">
                            @csrf
                            @method("PUT")
                            
                            {{-- Nama Fakultas Field --}}
                            <div class="mb-4">
                                <label for="nama_fakultas" class="form-label fw-semibold">
                                    <i class="bi bi-building me-1 text-primary"></i>Nama Fakultas <span class="text-danger">*</span>
                                </label>
                                <input 
                                    name="nama_fakultas"
                                    id="nama_fakultas"
                                    type="text"
                                    placeholder="Masukkan nama fakultas"
                                    class="form-control form-control-lg @error('nama_fakultas') is-invalid @enderror"
                                    value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}"
                                    required
                                >
                                @error('nama_fakultas')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @else
                                    <div class="form-text">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Contoh: Fakultas Ilmu Komputer, Fakultas Ekonomi, dll. Maksimal 100 karakter.
                                    </div>
                                @enderror
                            </div>
                            
                            {{-- Nama Dekan Field --}}
                            <div class="mb-4">
                                <label for="nama_dekan" class="form-label fw-semibold">
                                    <i class="bi bi-person-badge me-1 text-success"></i>Nama Dekan <span class="text-danger">*</span>
                                </label>
                                <input 
                                    name="nama_dekan"
                                    id="nama_dekan"
                                    type="text"
                                    placeholder="Masukkan nama dekan"
                                    class="form-control form-control-lg @error('nama_dekan') is-invalid @enderror"
                                    value="{{ old('nama_dekan', $fakultas->nama_dekan) }}"
                                    required
                                >
                                @error('nama_dekan')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @else
                                    <div class="form-text">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Masukkan nama lengkap dekan fakultas. Maksimal 100 karakter.
                                    </div>
                                @enderror
                            </div>
                            
                            {{-- Informasi ID dan Timestamps (Readonly) --}}
                            <div class="mb-4 p-3 bg-light rounded-3">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <small class="text-muted d-block">
                                            <i class="bi bi-hash"></i> ID Fakultas
                                        </small>
                                        <span class="fw-semibold text-primary">{{ $fakultas->id }}</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block">
                                            <i class="bi bi-calendar-plus"></i> Dibuat Pada
                                        </small>
                                        <span class="fw-semibold">{{ $fakultas->created_at->format('d/m/Y H:i:s') }}</span>
                                    </div>
                                    @if(isset($fakultas->updated_at))
                                    <div class="col-sm-6 mt-2">
                                        <small class="text-muted d-block">
                                            <i class="bi bi-calendar-check"></i> Terakhir Update
                                        </small>
                                        <span class="fw-semibold">{{ $fakultas->updated_at->format('d/m/Y H:i:s') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- TAMBAHAN: Info Peringatan --}}
                            <div class="alert alert-warning py-2 mb-4" style="font-size: 13px;">
                                <i class="bi bi-exclamation-triangle me-1"></i>
                                <strong>Perhatian:</strong> Pastikan data yang diubah sudah benar.
                            </div>
                            
                            {{-- Action Buttons --}}
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="/fakultas" class="btn btn-light btn-lg px-4 border">
                                    <i class="bi bi-x-circle me-1"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg px-4">
                                    <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TAMBAHAN: Script untuk auto dismiss alert --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto dismiss alerts after 5 seconds
            setTimeout(function() {
                let alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    let bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
</x-layout>
<x-layout>

    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-8">

                <div class="card shadow border-0 rounded-4">

                    <!-- Header -->
                    <div class="card-header bg-primary text-white rounded-top-4 py-3">
                        <h4 class="mb-0">
                            <i class="bi bi-building-add me-2"></i>
                            Tambah Fakultas
                        </h4>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <p class="text-muted mb-4">
                            Silakan isi data fakultas dengan lengkap dan benar.
                        </p>

                        {{-- Error Validasi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    Validasi Gagal!
                                </strong>

                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        {{-- Session Error --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <i class="bi bi-x-circle-fill me-2"></i>
                                {{ session('error') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Form -->
                        <form action="/fakultas" method="POST">
                            @csrf

                            <!-- Nama Fakultas -->
                            <div class="mb-3">
                                <label for="nama_fakultas" class="form-label fw-semibold">
                                    Nama Fakultas
                                </label>

                                <input
                                    type="text"
                                    name="nama_fakultas"
                                    id="nama_fakultas"
                                    class="form-control form-control-lg @error('nama_fakultas') is-invalid @enderror"
                                    placeholder="Masukkan nama fakultas"
                                    value="{{ old('nama_fakultas') }}"
                                    required
                                >

                                @error('nama_fakultas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Nama Dekan -->
                            <div class="mb-4">
                                <label for="nama_dekan" class="form-label fw-semibold">
                                    Nama Dekan
                                </label>

                                <input
                                    type="text"
                                    name="nama_dekan"
                                    id="nama_dekan"
                                    class="form-control form-control-lg @error('nama_dekan') is-invalid @enderror"
                                    placeholder="Masukkan nama dekan"
                                    value="{{ old('nama_dekan') }}"
                                    required
                                >

                                @error('nama_dekan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Info -->
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle-fill me-1"></i>
                                Pastikan data fakultas sudah benar sebelum disimpan.
                            </div>

                            <!-- Button -->
                            <div class="d-flex justify-content-end gap-2">

                                <a href="/fakultas" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-1"></i>
                                    Kembali
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan
                                </button>

                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</x-layout>
<x-layout>
  <div class="d-flex justify-content-center py-5">
    <div class="card border-0 shadow-sm" style="width: 100%; max-width: 480px;">
      <div class="card-body p-4">
        <div class="mb-4">
          <h5 class="fw-semibold mb-0">
            <i class="bi bi-plus-circle text-primary me-2"></i>Tambah Fakultas
          </h5>
          <p class="text-muted mb-0 mt-1" style="font-size: 13px;">
            Isi informasi fakultas baru di bawah ini.
          </p>
        </div>
        <hr>

        {{-- Menampilkan semua error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                    <strong>Validasi Gagal!</strong>
                </div>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Menampilkan error spesifik dari session --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-x-circle-fill me-2 fs-5"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        <form action="/fakultas" method="POST">
          @csrf

          {{-- Field Nama Fakultas --}}
          <div class="mb-3">
            <label for="nama_fakultas" class="form-label small fw-medium text-secondary">
              Nama Fakultas <span class="text-danger">*</span>
            </label>
            <input
              id="nama_fakultas"
              name="nama_fakultas"
              type="text"
              placeholder="contoh: Fakultas Teknik"
              class="form-control @error('nama_fakultas') is-invalid @enderror"
              value="{{ old('nama_fakultas') }}"
              required
            >
            @error('nama_fakultas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <small class="text-muted" style="font-size: 11px;">
                    <i class="bi bi-info-circle"></i> Maksimal 100 karakter, harus unik
                </small>
            @enderror
          </div>

          {{-- Field Nama Dekan --}}
          <div class="mb-4">
            <label for="nama_dekan" class="form-label small fw-medium text-secondary">
              Nama Dekan <span class="text-danger">*</span>
            </label>
            <input
              id="nama_dekan"
              name="nama_dekan"
              type="text"
              placeholder="contoh: Prof. Dr. Budi Santoso, M.T."
              class="form-control @error('nama_dekan') is-invalid @enderror"
              value="{{ old('nama_dekan') }}"
              required
            >
            @error('nama_dekan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <small class="text-muted" style="font-size: 11px;">
                    <i class="bi bi-info-circle"></i> Maksimal 100 karakter
                </small>
            @enderror
          </div>

          {{-- Informasi tambahan --}}
          <div class="alert alert-info py-2 mb-4" style="font-size: 12px; background-color: #e7f3ff;">
            <i class="bi bi-lightbulb me-1"></i>
            <strong>Tips:</strong> Pastikan data yang dimasukkan sudah benar sebelum menyimpan.
          </div>

          <div class="d-flex gap-2 justify-content-end">
            <a href="/fakultas" class="btn btn-light border px-4">
              <i class="bi bi-arrow-left me-1"></i>Batal
            </a>
            <button type="submit" class="btn btn-primary px-4">
              <i class="bi bi-save me-1"></i>Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>
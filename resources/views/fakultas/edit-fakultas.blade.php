<x-layout>

<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card shadow border-0">

                {{-- HEADER --}}
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="mb-0">
                                <i class="bi bi-pencil-square me-2"></i>
                                Edit Fakultas
                            </h5>
                            <small>Perbarui data fakultas</small>
                        </div>

                        <a href="/fakultas" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left"></i>
                        </a>

                    </div>
                </div>


                {{-- BODY --}}
                <div class="card-body">

                    {{-- ALERT --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Validasi gagal!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif


                    {{-- FORM --}}
                    <form action="/fakultas/{{ $fakultas->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nama Fakultas --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Fakultas</label>

                            <input
                                type="text"
                                name="nama_fakultas"
                                class="form-control form-control-lg @error('nama_fakultas') is-invalid @enderror"
                                value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}"
                                placeholder="Nama fakultas"
                            >

                            @error('nama_fakultas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Nama Dekan --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Dekan</label>

                            <input
                                type="text"
                                name="nama_dekan"
                                class="form-control form-control-lg @error('nama_dekan') is-invalid @enderror"
                                value="{{ old('nama_dekan', $fakultas->nama_dekan) }}"
                                placeholder="Nama dekan"
                            >

                            @error('nama_dekan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- INFO BOX --}}
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-1"></i>
                            Pastikan data sudah benar sebelum disimpan.
                        </div>


                        {{-- METADATA --}}
                        <div class="row g-2 mb-3">

                            <div class="col-md-4">
                                <div class="border rounded p-2 text-center">
                                    <small class="text-muted">ID</small>
                                    <div class="fw-bold">{{ $fakultas->id }}</div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="border rounded p-2 text-center">
                                    <small class="text-muted">Dibuat</small>
                                    <div class="fw-bold">{{ $fakultas->created_at }}</div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="border rounded p-2 text-center">
                                    <small class="text-muted">Update</small>
                                    <div class="fw-bold">{{ $fakultas->updated_at }}</div>
                                </div>
                            </div>

                        </div>


                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a href="/fakultas" class="btn btn-secondary">
                                Batal
                            </a>

                            <button class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i>
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
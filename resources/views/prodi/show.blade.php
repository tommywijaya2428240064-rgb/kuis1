<x-layout>
    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-lg-9">

                <div class="card border-0 shadow-sm rounded-3">

                    {{-- HEADER --}}
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div>
                                <h5 class="mb-0 fw-bold">
                                    <i class="bi bi-info-circle text-info me-2"></i>
                                    Detail Program Studi
                                </h5>
                                <small class="text-muted">Informasi lengkap data prodi</small>
                            </div>

                            <a href="{{ route('prodi.index') }}" class="btn btn-light border btn-sm">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted">ID</small>
                                    <div class="fw-bold">{{ $prodi->id }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted">Alias Prodi</small>
                                    <div>
                                        <span class="badge bg-info text-white px-3 py-2">
                                            {{ $prodi->alias_prodi }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted">Nama Program Studi</small>
                                    <div class="fw-semibold">{{ $prodi->nama_prodi }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted">Fakultas</small>
                                    <div class="fw-semibold">
                                        {{ $prodi->fakultas->nama_fakultas ?? '-' }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted">Ketua Program Studi</small>
                                    <div class="fw-semibold">{{ $prodi->nama_kaprodi }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted">Dibuat</small>
                                    <div class="fw-semibold">
                                        {{ $prodi->created_at->format('d/m/Y H:i:s') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted">Terakhir Update</small>
                                    <div class="fw-semibold">
                                        {{ $prodi->updated_at->format('d/m/Y H:i:s') }}
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- ACTION BUTTON --}}
                        <div class="d-flex justify-content-end gap-2 mt-4">

                            <a href="{{ route('prodi.index') }}"
                               class="btn btn-light border">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>

                            <a href="{{ route('prodi.edit', $prodi->id) }}"
                               class="btn btn-warning">
                                <i class="bi bi-pencil-square me-1"></i>Edit
                            </a>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</x-layout>


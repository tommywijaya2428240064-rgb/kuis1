<x-layout>
    <div class="container-fluid px-4 py-4">

        {{-- HEADER --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div>
                        <h4 class="fw-bold mb-0">
                            <i class="bi bi-book text-primary me-2"></i>Manajemen Program Studi
                        </h4>
                        <small class="text-muted">Kelola data program studi</small>
                    </div>

                    <a href="{{ route('prodi.create') }}" class="btn btn-primary shadow-sm">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Prodi
                    </a>
                </div>
            </div>
        </div>

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0">
                <i class="bi bi-x-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- CARD TABLE --}}
        <div class="card border-0 shadow-sm rounded-3">

            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-list-ul text-primary me-2"></i>Daftar Program Studi
                </h5>
            </div>

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">No</th>
                                <th>Alias</th>
                                <th>Nama Prodi</th>
                                <th>Fakultas</th>
                                <th>Kaprodi</th>
                                <th class="text-center pe-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($prodis as $item)
                                <tr>
                                    <td class="ps-3 fw-semibold text-muted">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <span class="badge bg-info text-white px-3 py-2">
                                            {{ $item->alias_prodi }}
                                        </span>
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $item->nama_prodi }}
                                    </td>

                                    <td>
                                        <span class="text-muted">
                                            {{ $item->fakultas->nama_fakultas ?? '-' }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $item->nama_kaprodi }}
                                    </td>

                                    <td class="text-center pe-3">
                                        <div class="d-flex justify-content-center gap-1">

                                            <a href="{{ route('prodi.show', $item->id) }}"
                                               class="btn btn-sm btn-outline-info"
                                               title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('prodi.edit', $item->id) }}"
                                               class="btn btn-sm btn-outline-warning"
                                               title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('prodi.destroy', $item->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-outline-danger"
                                                        title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-inbox fs-1 text-muted"></i>
                                        <p class="mt-2 text-muted">Belum ada data program studi</p>
                                        <a href="{{ route('prodi.create') }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-plus-circle me-1"></i>Tambah Sekarang
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>

            {{-- PAGINATION --}}
            @if(method_exists($prodis, 'links'))
                <div class="card-footer bg-white border-0">
                    {{ $prodis->links() }}
                </div>
            @endif

        </div>
    </div>
</x-layout>
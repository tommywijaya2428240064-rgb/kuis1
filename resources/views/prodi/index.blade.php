<x-layout>
    <div class="container-fluid px-4 py-4">
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="fw-bold mb-0">
                    <i class="bi bi-book text-primary me-2"></i>Manajemen Program Studi
                </h4>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Program Studi</h5>
                    <a href="{{ route('prodi.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Prodi
                    </a>
                </div>
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
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($prodis as $item)
                            <tr>
                                <td class="ps-3">{{ $loop->iteration }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $item->alias_prodi }}</span>
                                </td>
                                <td>{{ $item->nama_prodi }}</td>
                                <td>{{ $item->fakultas->nama_fakultas ?? '-' }}</td>
                                <td>{{ $item->nama_kaprodi }}</td>
                                <td class="text-center">
                                    <a href="{{ route('prodi.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('prodi.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('prodi.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-book fs-1 text-muted"></i>
                                        <p class="mt-2">Belum ada data program studi</p>
                                        <a href="{{ route('prodi.create') }}" class="btn btn-primary btn-sm">
                                            Tambah Sekarang
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if(method_exists($prodis, 'links'))
                <div class="card-footer bg-white">
                    {{ $prodis->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layout>
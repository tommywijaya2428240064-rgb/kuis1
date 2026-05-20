<x-layout>

<div class="container py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <nav class="breadcrumb">
            <a class="breadcrumb-item text-decoration-none" href="/">
                <i class="bi bi-house"></i> Dashboard
            </a>
            <span class="breadcrumb-item active">Fakultas</span>
        </nav>

        <h4 class="fw-bold mb-0">
            <i class="bi bi-building text-primary me-2"></i>
            Manajemen Fakultas
        </h4>
        <small class="text-muted">Kelola data fakultas</small>
    </div>


    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    {{-- STAT CARD --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex gap-3">
                    <i class="bi bi-building fs-2 text-primary"></i>
                    <div>
                        <small>Total Fakultas</small>
                        <h5 class="mb-0">{{ $fakultas->count() }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex gap-3">
                    <i class="bi bi-book fs-2 text-success"></i>
                    <div>
                        <small>Total Prodi</small>
                        <h5 class="mb-0">{{ App\Models\Prodi::count() }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex gap-3">
                    <i class="bi bi-person-badge fs-2 text-warning"></i>
                    <div>
                        <small>Dekan</small>
                        <h5 class="mb-0">{{ $fakultas->count() }}</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- CARD TABLE --}}
    <div class="card shadow-sm">

        {{-- HEADER --}}
        <div class="card-header bg-white d-flex justify-content-between align-items-center flex-wrap gap-2">

            <div>
                <h5 class="mb-0">Daftar Fakultas</h5>
                <small class="text-muted">{{ $fakultas->count() }} data</small>
            </div>

            <div class="d-flex gap-2">

                <input type="text"
                       class="form-control form-control-sm"
                       placeholder="Cari..."
                       id="searchInput">

                <a href="/fakultas" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-repeat"></i>
                </a>

                <a href="/fakultas/create" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Tambah
                </a>

            </div>

        </div>


        {{-- TABLE --}}
        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Fakultas</th>
                        <th>Dekan</th>
                        <th class="text-center">Prodi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($fakultas as $item)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <div class="fw-semibold">{{ $item->nama_fakultas }}</div>
                            <small class="text-muted">ID: {{ $item->id }}</small>
                        </td>

                        <td>{{ $item->nama_dekan }}</td>

                        <td class="text-center">
                            <span class="badge bg-info">
                                {{ $item->prodis->count() ?? 0 }}
                            </span>
                        </td>

                        <td class="text-center">

                            <a href="/fakultas/{{ $item->id }}" class="btn btn-sm btn-info text-white">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="/fakultas/{{ $item->id }}/edit" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <button class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama_fakultas }}">
                                <i class="bi bi-trash"></i>
                            </button>

                        </td>

                    </tr>
                @empty

                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            Tidak ada data
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- MODAL DELETE --}}
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body text-center p-4">

                <h5>Hapus Fakultas?</h5>
                <p id="namaFakultas"></p>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger w-100">Hapus</button>
                    <button type="button" class="btn btn-light w-100 mt-2" data-bs-dismiss="modal">
                        Batal
                    </button>
                </form>

            </div>

        </div>
    </div>
</div>


{{-- SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('deleteModal');

    modal.addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;
        const id = btn.getAttribute('data-id');
        const nama = btn.getAttribute('data-nama');

        document.getElementById('namaFakultas').innerText = nama;
        document.getElementById('deleteForm').action = `/fakultas/${id}`;
    });

});
</script>

</x-layout>
<x-layout>
    <div class="container-fluid px-4 py-4">

        {{-- Page Header --}}
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-decoration-none">
                                <i class="bi bi-house-door"></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Fakultas</li>
                    </ol>
                </nav>
                <h4 class="fw-bold mb-0">
                    <i class="bi bi-building text-primary me-2"></i>Manajemen Fakultas
                </h4>
                <p class="text-muted mt-1 mb-0">Kelola seluruh data fakultas yang terdaftar di sistem</p>
            </div>
        </div>

        {{-- Alert Session --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div class="flex-grow-1">
                        <strong>Sukses!</strong> {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-x-circle-fill me-2 fs-5"></i>
                    <div class="flex-grow-1">
                        <strong>Error!</strong> {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        {{-- Stats Card --}}
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 h-100 hover-lift">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                            <i class="bi bi-building fs-4 text-primary"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0">Total Fakultas</p>
                            <h4 class="fw-bold mb-0">{{ $fakultas->total() ?? $fakultas->count() }}</h4>
                            <small class="text-success">
                                <i class="bi bi-arrow-up-short"></i> +12% dari bulan lalu
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 h-100 hover-lift">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="bg-success bg-opacity-10 rounded-3 p-3">
                            <i class="bi bi-person-badge fs-4 text-success"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0">Total Dekan</p>
                            <h4 class="fw-bold mb-0">{{ $fakultas->total() ?? $fakultas->count() }}</h4>
                            <small class="text-muted">
                                <i class="bi bi-person"></i> Aktif semua
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 h-100 hover-lift">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="bg-info bg-opacity-10 rounded-3 p-3">
                            <i class="bi bi-book fs-4 text-info"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0">Total Prodi</p>
                            <h4 class="fw-bold mb-0">{{ App\Models\Prodi::count() }}</h4>
                            <small class="text-muted">
                                <i class="bi bi-building"></i> Tersebar
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 h-100 hover-lift">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="bg-warning bg-opacity-10 rounded-3 p-3">
                            <i class="bi bi-calendar fs-4 text-warning"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0">Terbaru Ditambahkan</p>
                            <h6 class="fw-bold mb-0 text-truncate" style="max-width: 150px;">
                                {{ $fakultas->isNotEmpty() ? $fakultas->first()->nama_fakultas : '-' }}
                            </h6>
                            <small class="text-muted">
                                <i class="bi bi-clock"></i> Baru saja
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Card --}}
        <div class="card border-0 shadow-sm rounded-3">

            {{-- Card Header --}}
            <div class="card-header bg-white border-bottom py-3 px-4">
                <div class="row align-items-center g-2">
                    <div class="col-12 col-md-6">
                        <h5 class="fw-bold mb-0 text-dark">
                            <i class="bi bi-list-ul text-primary me-2"></i>Daftar Fakultas
                        </h5>
                        <p class="text-muted small mb-0 mt-1">
                            Menampilkan {{ $fakultas->total() ?? $fakultas->count() }} data fakultas
                        </p>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex flex-wrap gap-2 justify-content-md-end">
                            {{-- Search --}}
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-search text-muted"></i>
                                </span>
                                <input type="text"
                                       class="form-control bg-light border-start-0"
                                       placeholder="Cari fakultas atau dekan..."
                                       id="searchInput">
                                <button class="btn btn-light border" type="button" id="clearSearch">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            {{-- Refresh Button --}}
                            <a href="/fakultas" class="btn btn-light border btn-sm px-3">
                                <i class="bi bi-arrow-repeat me-1"></i>
                            </a>
                            {{-- Tambah Button --}}
                            <a href="/fakultas/create" class="btn btn-primary btn-sm px-3">
                                <i class="bi bi-plus-lg me-1"></i>Tambah Fakultas
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="fakultasTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center text-muted fw-semibold ps-4" style="width: 60px;">
                                    <i class="bi bi-hash"></i> No
                                </th>
                                <th class="text-muted fw-semibold">
                                    <i class="bi bi-building me-1"></i> Nama Fakultas
                                </th>
                                <th class="text-muted fw-semibold">
                                    <i class="bi bi-person me-1"></i> Dekan
                                </th>
                                <th class="text-muted fw-semibold text-center">
                                    <i class="bi bi-book me-1"></i> Jml Prodi
                                </th>
                                <th class="text-center text-muted fw-semibold pe-4" style="width: 180px;">
                                    <i class="bi bi-gear me-1"></i> Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fakultas as $item)
                                <tr class="border-bottom searchable-row">
                                    {{-- No --}}
                                    <td class="text-center ps-4">
                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill fw-semibold px-2">
                                            {{ $loop->iteration }}
                                        </span>
                                    </td>

                                    {{-- Nama Fakultas --}}
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-circle bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                                                 style="width:40px; height:40px;">
                                                <i class="bi bi-building fs-5"></i>
                                            </div>
                                            <div>
                                                <p class="fw-semibold mb-0 searchable-name">
                                                    {{ $item->nama_fakultas }}
                                                </p>
                                                <small class="text-muted">ID: {{ $item->id }}</small>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Dekan --}}
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-circle bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                                 style="width:32px; height:32px;">
                                                <i class="bi bi-person fs-6"></i>
                                            </div>
                                            <div>
                                                <span class="fw-medium searchable-dekan">
                                                    {{ $item->nama_dekan }}
                                                </span>
                                                <br>
                                                <small class="text-muted">Dekan</small>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Jumlah Prodi --}}
                                    <td class="text-center">
                                        <span class="badge bg-info text-white rounded-pill px-3 py-2">
                                            <i class="bi bi-book me-1"></i>
                                            {{ isset($item->prodis) ? $item->prodis->count() : 0 }} Prodi
                                        </span>
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="pe-4">
                                        <div class="d-flex gap-1 justify-content-center">

                                            {{-- Detail --}}
                                            <a href="/fakultas/{{ $item->id }}"
                                               class="btn btn-sm btn-light border"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="top"
                                               title="Lihat Detail">
                                                <i class="bi bi-eye text-info"></i>
                                            </a>

                                            {{-- Edit --}}
                                            <a href="/fakultas/{{ $item->id }}/edit"
                                               class="btn btn-sm btn-light border"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="top"
                                               title="Edit Data">
                                                <i class="bi bi-pencil text-warning"></i>
                                            </a>

                                            {{-- Hapus --}}
                                            <button type="button"
                                                    class="btn btn-sm btn-light border btn-delete"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"
                                                    data-id="{{ $item->id }}"
                                                    data-nama="{{ $item->nama_fakultas }}"
                                                    data-prodi-count="{{ isset($item->prodis) ? $item->prodis->count() : 0 }}"
                                                    title="Hapus Data">
                                                <i class="bi bi-trash text-danger"></i>
                                            </button>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="py-4">
                                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                                 style="width:80px; height:80px;">
                                                <i class="bi bi-building-x fs-2 text-muted"></i>
                                            </div>
                                            <h6 class="fw-semibold text-muted">Belum Ada Data Fakultas</h6>
                                            <p class="text-muted small mb-3">
                                                Mulai tambahkan data fakultas untuk ditampilkan disini.
                                            </p>
                                            <a href="/fakultas/create" class="btn btn-primary btn-sm px-4">
                                                <i class="bi bi-plus-lg me-1"></i>Tambah Sekarang
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Card Footer with Pagination --}}
            @if(method_exists($fakultas, 'hasPages') && $fakultas->hasPages())
                <div class="card-footer bg-white border-top py-3 px-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                        <div>
                            <p class="text-muted small mb-0">
                                <i class="bi bi-info-circle me-1"></i>
                                Menampilkan {{ $fakultas->firstItem() }}–{{ $fakultas->lastItem() }}
                                dari {{ $fakultas->total() }} data fakultas
                            </p>
                        </div>
                        <div>
                            {{ $fakultas->links() }}
                        </div>
                        <div>
                            <select id="perPageSelect" class="form-select form-select-sm">
                                <option value="10" {{ $fakultas->perPage() == 10 ? 'selected' : '' }}>10 per halaman</option>
                                <option value="25" {{ $fakultas->perPage() == 25 ? 'selected' : '' }}>25 per halaman</option>
                                <option value="50" {{ $fakultas->perPage() == 50 ? 'selected' : '' }}>50 per halaman</option>
                                <option value="100" {{ $fakultas->perPage() == 100 ? 'selected' : '' }}>100 per halaman</option>
                            </select>
                        </div>
                    </div>
                </div>
            @else
                <div class="card-footer bg-white border-top py-3 px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted small mb-0">
                            <i class="bi bi-info-circle me-1"></i>
                            Menampilkan {{ $fakultas->count() }} data fakultas
                        </p>
                        <small class="text-muted">
                            <i class="bi bi-clock me-1"></i>
                            Terakhir diperbarui: {{ now()->format('d/m/Y H:i:s') }}
                        </small>
                    </div>
                </div>
            @endif

        </div>
    </div>

    {{-- ==================== MODAL DELETE ==================== --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-3">
                <div class="modal-body text-center p-5">

                    {{-- Icon --}}
                    <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex
                                align-items-center justify-content-center mb-4"
                         style="width:72px; height:72px;">
                        <i class="bi bi-exclamation-triangle fs-2 text-danger"></i>
                    </div>

                    <h5 class="fw-bold mb-2">Hapus Fakultas?</h5>
                    <p class="text-muted mb-1">Anda akan menghapus fakultas:</p>
                    <p class="fw-semibold text-danger mb-3 fs-5" id="modalFakultasNama">-</p>
                    
                    {{-- Warning if has prodi --}}
                    <div id="prodiWarning" style="display: none;" class="alert alert-warning py-2 mb-3">
                        <i class="bi bi-exclamation-circle me-1"></i>
                        <small id="prodiCountText"></small>
                    </div>
                    
                    <p class="text-muted small">
                        Tindakan ini <strong>tidak dapat dibatalkan</strong> dan
                        semua data terkait (program studi) akan ikut terhapus.
                    </p>

                    <div class="d-flex gap-2 justify-content-center mt-4">
                        <button type="button"
                                class="btn btn-light border px-4"
                                data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-1"></i>Batal
                        </button>
                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4">
                                <i class="bi bi-trash me-1"></i>Ya, Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- ==================== SCRIPTS ==================== --}}
    <style>
        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        .table tbody tr {
            transition: background-color 0.2s ease;
        }
        .table tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.05);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ── Tooltip ──────────────────────────────────────
            const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            tooltips.forEach(el => new bootstrap.Tooltip(el, { trigger: 'hover' }));

            // ── Delete Modal with Prodi Check ─────────────────
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                const btn = event.relatedTarget;
                const id = btn.getAttribute('data-id');
                const nama = btn.getAttribute('data-nama');
                const prodiCount = btn.getAttribute('data-prodi-count') || 0;

                document.getElementById('modalFakultasNama').textContent = nama;
                document.getElementById('deleteForm').action = `/fakultas/${id}`;
                
                // Show warning if has program studi
                const prodiWarning = document.getElementById('prodiWarning');
                const prodiCountText = document.getElementById('prodiCountText');
                
                if (prodiCount > 0) {
                    prodiWarning.style.display = 'block';
                    prodiCountText.innerHTML = `<i class="bi bi-exclamation-triangle me-1"></i> 
                        Fakultas ini memiliki <strong>${prodiCount} program studi</strong> yang akan ikut terhapus!`;
                } else {
                    prodiWarning.style.display = 'none';
                }
            });

            // ── Search with Counter ───────────────────────────
            const searchInput = document.getElementById('searchInput');
            const clearSearch = document.getElementById('clearSearch');
            
            function updateSearch() {
                const query = searchInput.value.toLowerCase().trim();
                const rows = document.querySelectorAll('.searchable-row');
                let visibleCount = 0;
                
                rows.forEach(row => {
                    const nama = row.querySelector('.searchable-name')?.textContent.toLowerCase() ?? '';
                    const dekan = row.querySelector('.searchable-dekan')?.textContent.toLowerCase() ?? '';
                    const isVisible = nama.includes(query) || dekan.includes(query);
                    row.style.display = isVisible ? '' : 'none';
                    if (isVisible) visibleCount++;
                });
                
                // Update search info (optional)
                const searchInfo = document.querySelector('.card-header .text-muted');
                if (searchInfo && query !== '') {
                    searchInfo.innerHTML = `Menampilkan ${visibleCount} dari ${rows.length} data untuk "${query}"`;
                } else if (searchInfo) {
                    searchInfo.innerHTML = `Menampilkan ${rows.length} data fakultas`;
                }
            }
            
            searchInput.addEventListener('keyup', updateSearch);
            
            // Clear search
            if (clearSearch) {
                clearSearch.addEventListener('click', function() {
                    searchInput.value = '';
                    updateSearch();
                    searchInput.focus();
                });
            }

            // ── Per Page Select ───────────────────────────────
            const perPageSelect = document.getElementById('perPageSelect');
            if (perPageSelect) {
                perPageSelect.addEventListener('change', function() {
                    const perPage = this.value;
                    const url = new URL(window.location.href);
                    url.searchParams.set('per_page', perPage);
                    window.location.href = url.toString();
                });
            }

            // ── Auto Dismiss Alerts ───────────────────────────
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
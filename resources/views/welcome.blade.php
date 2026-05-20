<x-layout>
    <div class="container mt-5">
        <!-- Hero Section -->
        <div class="text-center mb-5">
            <div class="mb-4">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-4">
                    <i class="bi bi-mortarboard-fill text-primary" style="font-size: 4rem;"></i>
                </div>
            </div>
            <h1 class="display-4 fw-bold text-primary mb-3">Sistem Informasi Akademik</h1>
            <p class="lead text-muted mb-4">
                Kelola data Fakultas dan Program Studi dengan mudah dan efisien
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="/fakultas" class="btn btn-primary btn-lg px-4">
                    <i class="bi bi-building me-2"></i>Kelola Fakultas
                </a>
                <a href="/prodi" class="btn btn-success btn-lg px-4">
                    <i class="bi bi-book me-2"></i>Kelola Program Studi
                </a>
                <a href="#" class="btn btn-outline-secondary btn-lg px-4" data-bs-toggle="modal" data-bs-target="#aboutModal">
                    <i class="bi bi-info-circle me-2"></i>Tentang Aplikasi
                </a>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="row g-4 mb-5">
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center hover-lift">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-building fs-2 text-primary"></i>
                        </div>
                        <h2 class="fw-bold mb-0 text-primary" id="totalFakultas">0</h2>
                        <p class="text-muted mb-0">Total Fakultas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center hover-lift">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-book fs-2 text-success"></i>
                        </div>
                        <h2 class="fw-bold mb-0 text-success" id="totalProdi">0</h2>
                        <p class="text-muted mb-0">Total Program Studi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center hover-lift">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-person-badge fs-2 text-info"></i>
                        </div>
                        <h2 class="fw-bold mb-0 text-info" id="totalDekan">0</h2>
                        <p class="text-muted mb-0">Total Dekan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm text-center hover-lift">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-person fs-2 text-warning"></i>
                        </div>
                        <h2 class="fw-bold mb-0 text-warning" id="totalKaprodi">0</h2>
                        <p class="text-muted mb-0">Total Kaprodi</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-database fs-2 text-primary"></i>
                        </div>
                        <h5 class="fw-bold">Manajemen Data</h5>
                        <p class="text-muted small">
                            Kelola data fakultas dan program studi dengan sistem CRUD yang lengkap
                        </p>
                        <a href="/fakultas" class="btn btn-sm btn-outline-primary mt-2">
                            Lihat Data <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body p-4 text-center">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-search fs-2 text-success"></i>
                        </div>
                        <h5 class="fw-bold">Pencarian Mudah</h5>
                        <p class="text-muted small">
                            Fitur pencarian real-time untuk menemukan data dengan cepat
                        </p>
                        <a href="/fakultas" class="btn btn-sm btn-outline-success mt-2">
                            Coba Sekarang <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body p-4 text-center">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-shield-check fs-2 text-info"></i>
                        </div>
                        <h5 class="fw-bold">Validasi Data</h5>
                        <p class="text-muted small">
                            Sistem validasi input untuk memastikan data akurat dan konsisten
                        </p>
                        <a href="/fakultas/create" class="btn btn-sm btn-outline-info mt-2">
                            Tambah Data <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Data Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom-0 py-3">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-clock-history text-primary me-2"></i>Data Terbaru
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-semibold mb-3">
                                    <i class="bi bi-building me-1"></i> Fakultas Terbaru
                                </h6>
                                <div id="recentFakultas">
                                    <div class="text-center py-3">
                                        <div class="spinner-border text-primary spinner-border-sm"></div>
                                        <p class="text-muted small mt-2">Memuat data...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-semibold mb-3">
                                    <i class="bi bi-book me-1"></i> Program Studi Terbaru
                                </h6>
                                <div id="recentProdi">
                                    <div class="text-center py-3">
                                        <div class="spinner-border text-success spinner-border-sm"></div>
                                        <p class="text-muted small mt-2">Memuat data...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Menu -->
        <div class="row mt-4 mb-5">
            <div class="col-12">
                <div class="card border-0 bg-gradient-primary text-white">
                    <div class="card-body p-4 text-center">
                        <h5 class="mb-3 text-white">Akses Cepat Menu</h5>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="/fakultas" class="btn btn-light">
                                <i class="bi bi-building me-1"></i> Data Fakultas
                            </a>
                            <a href="/fakultas/create" class="btn btn-light">
                                <i class="bi bi-plus-circle me-1"></i> Tambah Fakultas
                            </a>
                            <a href="/prodi" class="btn btn-light">
                                <i class="bi bi-book me-1"></i> Data Prodi
                            </a>
                            <a href="/prodi/create" class="btn btn-light">
                                <i class="bi bi-plus-circle me-1"></i> Tambah Prodi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Modal -->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-3">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-info-circle text-primary me-2"></i>Tentang Aplikasi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-3">
                        <i class="bi bi-mortarboard-fill text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h6 class="fw-bold text-center">Sistem Informasi Akademik</h6>
                    <p class="text-muted small text-center mb-3">
                        Aplikasi untuk mengelola data fakultas dan program studi
                    </p>
                    <hr>
                    <div class="small">
                        <p class="mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <strong>Fitur:</strong>
                        </p>
                        <ul class="text-muted">
                            <li>CRUD Data Fakultas</li>
                            <li>CRUD Data Program Studi</li>
                            <li>Validasi Input Data</li>
                            <li>Pencarian Real-time</li>
                            <li>Responsive Design</li>
                        </ul>
                        <hr>
                        <p class="mb-0 text-center">
                            <small class="text-muted">
                                <i class="bi bi-code-slash me-1"></i>
                                Dibangun dengan Laravel 13 & Bootstrap 5
                            </small>
                        </p>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-primary btn-sm px-4" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card {
            transition: all 0.3s ease;
        }
        .recent-item {
            transition: background-color 0.2s ease;
            border-radius: 8px;
        }
        .recent-item:hover {
            background-color: #f8f9fa;
        }
    </style>

    <script>
        // Fetch total data counts
        async function fetchStats() {
            try {
                // You can create API endpoints or use existing ones
                const response = await fetch('/api/stats');
                if (response.ok) {
                    const data = await response.json();
                    document.getElementById('totalFakultas').textContent = data.total_fakultas || 0;
                    document.getElementById('totalProdi').textContent = data.total_prodi || 0;
                    document.getElementById('totalDekan').textContent = data.total_dekan || 0;
                    document.getElementById('totalKaprodi').textContent = data.total_kaprodi || 0;
                }
            } catch (error) {
                console.log('Stats not available yet');
                // Fallback to manual calculation if API not ready
                loadStatsFromPage();
            }
        }

        // Alternative: Load stats from the page using Laravel variables
        function loadStatsFromPage() {
            // You can pass data from controller to view
            @if(isset($stats))
                document.getElementById('totalFakultas').textContent = {{ $stats['total_fakultas'] ?? 0 }};
                document.getElementById('totalProdi').textContent = {{ $stats['total_prodi'] ?? 0 }};
                document.getElementById('totalDekan').textContent = {{ $stats['total_fakultas'] ?? 0 }};
                document.getElementById('totalKaprodi').textContent = {{ $stats['total_prodi'] ?? 0 }};
            @else
                // Default values
                document.getElementById('totalFakultas').textContent = '{{ App\Models\Fakultas::count() }}';
                document.getElementById('totalProdi').textContent = '{{ App\Models\Prodi::count() }}';
                document.getElementById('totalDekan').textContent = '{{ App\Models\Fakultas::count() }}';
                document.getElementById('totalKaprodi').textContent = '{{ App\Models\Prodi::count() }}';
            @endif
        }

        // Load recent data
        function loadRecentData() {
            // Fakultas terbaru
            const recentFakultas = @json($recentFakultas ?? App\Models\Fakultas::latest()->take(3)->get());
            const recentProdi = @json($recentProdi ?? App\Models\Prodi::with('fakultas')->latest()->take(3)->get());

            // Display recent fakultas
            const fakultasHtml = recentFakultas.length > 0 
                ? recentFakultas.map(f => `
                    <div class="recent-item p-2 mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-building text-primary me-2"></i>
                                <strong>${f.nama_fakultas}</strong>
                                <br>
                                <small class="text-muted">Dekan: ${f.nama_dekan}</small>
                            </div>
                            <small class="text-muted">${new Date(f.created_at).toLocaleDateString('id-ID')}</small>
                        </div>
                    </div>
                `).join('')
                : '<p class="text-muted text-center">Belum ada data fakultas</p>';

            // Display recent prodi
            const prodiHtml = recentProdi.length > 0
                ? recentProdi.map(p => `
                    <div class="recent-item p-2 mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-info me-2">${p.alias_prodi}</span>
                                <strong>${p.nama_prodi}</strong>
                                <br>
                                <small class="text-muted">Kaprodi: ${p.nama_kaprodi}</small>
                                ${p.fakultas ? `<br><small class="text-muted">Fakultas: ${p.fakultas.nama_fakultas}</small>` : ''}
                            </div>
                            <small class="text-muted">${new Date(p.created_at).toLocaleDateString('id-ID')}</small>
                        </div>
                    </div>
                `).join('')
                : '<p class="text-muted text-center">Belum ada data program studi</p>';

            document.getElementById('recentFakultas').innerHTML = fakultasHtml;
            document.getElementById('recentProdi').innerHTML = prodiHtml;
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            fetchStats();
            loadRecentData();
            
            // Add animation to stats numbers
            const statsNumbers = document.querySelectorAll('.card-body h2');
            statsNumbers.forEach(el => {
                const finalValue = parseInt(el.textContent);
                if (finalValue > 0) {
                    let current = 0;
                    const increment = finalValue / 30;
                    const updateNumber = () => {
                        current += increment;
                        if (current < finalValue) {
                            el.textContent = Math.floor(current);
                            requestAnimationFrame(updateNumber);
                        } else {
                            el.textContent = finalValue;
                        }
                    };
                    updateNumber();
                }
            });
        });
    </script>
</x-layout>
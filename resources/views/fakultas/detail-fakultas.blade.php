<x-layout>

<div class="container py-4">

    {{-- ALERT --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-x-circle-fill me-2"></i>
            {{ session('error') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    {{-- CARD DETAIL --}}
    <div class="card shadow border-0">

        {{-- HEADER --}}
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                <div>
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle me-2"></i>
                        Detail Fakultas
                    </h5>
                    <small>Informasi lengkap fakultas</small>
                </div>

                <div class="d-flex gap-2">
                    <a href="/fakultas" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i>
                    </a>

                    <a href="/fakultas/{{ $fakultas->id }}/edit" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i>
                    </a>
                </div>

            </div>
        </div>


        {{-- BODY --}}
        <div class="card-body">

            {{-- INFO GRID --}}
            <div class="row g-3">

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <small class="text-muted">Nama Fakultas</small>
                        <h5 class="mb-0">{{ $fakultas->nama_fakultas }}</h5>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <small class="text-muted">Nama Dekan</small>
                        <h5 class="mb-0">{{ $fakultas->nama_dekan }}</h5>
                    </div>
                </div>

            </div>


            {{-- PRODI --}}
            <div class="mt-4">

                <h6 class="mb-3">
                    <i class="bi bi-book me-2"></i>Program Studi
                </h6>

                @if($fakultas->prodis->count() > 0)

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Alias</th>
                                    <th>Nama Prodi</th>
                                    <th>Kaprodi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fakultas->prodis as $i => $prodi)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td><span class="badge bg-info">{{ $prodi->alias_prodi }}</span></td>
                                    <td>{{ $prodi->nama_prodi }}</td>
                                    <td>{{ $prodi->nama_kaprodi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @else
                    <div class="alert alert-info">
                        Belum ada program studi.
                    </div>
                @endif

            </div>


            {{-- META --}}
            <div class="row mt-4 g-3">

                <div class="col-md-4">
                    <div class="border rounded p-3 text-center">
                        <h6>Total Fakultas</h6>
                        <h4>{{ \App\Models\Fakultas::count() }}</h4>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="border rounded p-3 text-center">
                        <h6>Prodi</h6>
                        <h4>{{ $fakultas->prodis->count() }}</h4>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="border rounded p-3 text-center">
                        <h6>Dosen</h6>
                        <h4>{{ $fakultas->prodis->count() * 2 }}</h4>
                    </div>
                </div>

            </div>

        </div>


        {{-- FOOTER --}}
        <div class="card-footer d-flex justify-content-between">

            <small class="text-muted">
                ID: {{ $fakultas->id }} |
                {{ $fakultas->created_at }}
            </small>

            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="bi bi-trash"></i> Hapus
            </button>

        </div>

    </div>
</div>


{{-- MODAL DELETE --}}
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Hapus Fakultas</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <p>Yakin ingin hapus <b>{{ $fakultas->nama_fakultas }}</b>?</p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                <form method="POST" action="/fakultas/{{ $fakultas->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </div>

        </div>
    </div>
</div>

</x-layout>
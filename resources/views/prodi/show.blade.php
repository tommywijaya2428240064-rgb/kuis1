<x-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            <i class="bi bi-info-circle text-info me-2"></i>Detail Program Studi
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="200">ID</th>
                                <td>: {{ $prodi->id }}</td>
                            </tr>
                            <tr>
                                <th>Alias Prodi</th>
                                <td>: <span class="badge bg-info">{{ $prodi->alias_prodi }}</span></td>
                            </tr>
                            <tr>
                                <th>Nama Prodi</th>
                                <td>: {{ $prodi->nama_prodi }}</td>
                            </tr>
                            <tr>
                                <th>Fakultas</th>
                                <td>: {{ $prodi->fakultas->nama_fakultas ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Ketua Prodi</th>
                                <td>: {{ $prodi->nama_kaprodi }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat</th>
                                <td>: {{ $prodi->created_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Diupdate</th>
                                <td>: {{ $prodi->updated_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                        </table>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
                            <a href="{{ route('prodi.edit', $prodi->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
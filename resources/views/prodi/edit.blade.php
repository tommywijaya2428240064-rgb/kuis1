<x-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            <i class="bi bi-pencil-square text-warning me-2"></i>Edit Program Studi
                        </h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="fakultas_id" class="form-label">Fakultas <span class="text-danger">*</span></label>
                                <select name="fakultas_id" id="fakultas_id" class="form-select @error('fakultas_id') is-invalid @enderror" required>
                                    <option value="">Pilih Fakultas</option>
                                    @foreach($fakultas as $f)
                                        <option value="{{ $f->id }}" {{ old('fakultas_id', $prodi->fakultas_id) == $f->id ? 'selected' : '' }}>
                                            {{ $f->nama_fakultas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('fakultas_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alias_prodi" class="form-label">Alias Prodi <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="alias_prodi" 
                                       id="alias_prodi" 
                                       class="form-control @error('alias_prodi') is-invalid @enderror"
                                       value="{{ old('alias_prodi', $prodi->alias_prodi) }}"
                                       required>
                                @error('alias_prodi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_prodi" class="form-label">Nama Program Studi <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="nama_prodi" 
                                       id="nama_prodi" 
                                       class="form-control @error('nama_prodi') is-invalid @enderror"
                                       value="{{ old('nama_prodi', $prodi->nama_prodi) }}"
                                       required>
                                @error('nama_prodi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_kaprodi" class="form-label">Ketua Program Studi <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="nama_kaprodi" 
                                       id="nama_kaprodi" 
                                       class="form-control @error('nama_kaprodi') is-invalid @enderror"
                                       value="{{ old('nama_kaprodi', $prodi->nama_kaprodi) }}"
                                       required>
                                @error('nama_kaprodi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
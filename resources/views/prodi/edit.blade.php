<x-layout>

<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card shadow border-0">

                {{-- HEADER --}}
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-pencil-square me-2"></i>
                        Edit Program Studi
                    </h5>
                    <small>Perbarui data program studi</small>
                </div>


                {{-- BODY --}}
                <div class="card-body">

                    {{-- ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    {{-- FORM --}}
                    <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                        @csrf
                        @method('PUT')


                        {{-- Fakultas --}}
                        <div class="mb-3">
                            <label class="form-label">Fakultas</label>

                            <select name="fakultas_id"
                                    class="form-select @error('fakultas_id') is-invalid @enderror">

                                <option value="">Pilih Fakultas</option>

                                @foreach($fakultas as $f)
                                    <option value="{{ $f->id }}"
                                        {{ old('fakultas_id', $prodi->fakultas_id) == $f->id ? 'selected' : '' }}>
                                        {{ $f->nama_fakultas }}
                                    </option>
                                @endforeach

                            </select>

                            @error('fakultas_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Alias --}}
                        <div class="mb-3">
                            <label class="form-label">Alias Prodi</label>

                            <input type="text"
                                   name="alias_prodi"
                                   class="form-control @error('alias_prodi') is-invalid @enderror"
                                   value="{{ old('alias_prodi', $prodi->alias_prodi) }}">

                            @error('alias_prodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Nama Prodi --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Program Studi</label>

                            <input type="text"
                                   name="nama_prodi"
                                   class="form-control @error('nama_prodi') is-invalid @enderror"
                                   value="{{ old('nama_prodi', $prodi->nama_prodi) }}">

                            @error('nama_prodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Kaprodi --}}
                        <div class="mb-3">
                            <label class="form-label">Ketua Program Studi</label>

                            <input type="text"
                                   name="nama_kaprodi"
                                   class="form-control @error('nama_kaprodi') is-invalid @enderror"
                                   value="{{ old('nama_kaprodi', $prodi->nama_kaprodi) }}">

                            @error('nama_kaprodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- INFO --}}
                        <div class="alert alert-info">
                            Pastikan data yang diubah sudah benar sebelum disimpan.
                        </div>


                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('prodi.index') }}"
                               class="btn btn-secondary">
                                Batal
                            </a>

                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-check-circle me-1"></i>
                                Update
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

</x-layout>
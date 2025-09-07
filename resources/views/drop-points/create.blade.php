@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Tambah Drop Point Baru</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('drop-points.store') }}" method="POST">
                        @csrf

                        {{-- Nama Lokasi --}}
                        <div class="mb-3">
                            <label for="nama_lokasi" class="form-label fw-semibold">Nama Lokasi <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lokasi" id="nama_lokasi" value="{{ old('nama_lokasi') }}"
                                   class="form-control @error('nama_lokasi') is-invalid @enderror" required>
                            @error('nama_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-semibold">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3"
                                      class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Koordinat --}}
                        <div class="mb-3">
                            <label for="koordinat" class="form-label fw-semibold">Koordinat</label>
                            <input type="text" name="koordinat" id="koordinat" value="{{ old('koordinat') }}"
                                   class="form-control @error('koordinat') is-invalid @enderror">
                            @error('koordinat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('drop-points.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

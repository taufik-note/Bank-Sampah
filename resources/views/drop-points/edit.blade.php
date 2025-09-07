@extends('layouts.app')

@section('content')
<div class="container py-5 bg-light" style="min-height: calc(100vh - 56px); overflow-x: hidden;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Drop Point</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('drop-points.update', $dropPoint) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nama Lokasi --}}
                        <div class="mb-3">
                            <label for="nama_lokasi" class="form-label fw-semibold">Nama Lokasi <span class="text-danger">*</span></label>
                            <input type="text" id="nama_lokasi" name="nama_lokasi" 
                                   value="{{ old('nama_lokasi', $dropPoint->nama_lokasi) }}"
                                   class="form-control @error('nama_lokasi') is-invalid @enderror" required>
                            @error('nama_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-semibold">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="3" 
                                      class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $dropPoint->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Koordinat --}}
                        <div class="mb-4">
                            <label for="koordinat" class="form-label fw-semibold">Koordinat</label>
                            <input type="text" id="koordinat" name="koordinat" 
                                   value="{{ old('koordinat', $dropPoint->koordinat) }}"
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
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

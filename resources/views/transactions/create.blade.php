@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Tambah Transaksi Sampah Baru</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf

                        {{-- Lokasi Drop Point --}}
                        <div class="mb-3">
                            <label for="drop_point_id" class="form-label fw-semibold">Lokasi Drop Point <span class="text-danger">*</span></label>
                            <select name="drop_point_id" id="drop_point_id"
                                    class="form-select @error('drop_point_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Lokasi --</option>
                                @foreach($dropPoints as $dp)
                                    <option value="{{ $dp->id }}" {{ old('drop_point_id') == $dp->id ? 'selected' : '' }}>
                                        {{ $dp->nama_lokasi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('drop_point_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tanggal --}}
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal" id="tanggal"
                                   value="{{ old('tanggal', date('Y-m-d')) }}"
                                   class="form-control @error('tanggal') is-invalid @enderror" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jenis Sampah --}}
                        <div class="mb-3">
                            <label for="jenis_sampah" class="form-label fw-semibold">Jenis Sampah <span class="text-danger">*</span></label>
                            <input type="text" name="jenis_sampah" id="jenis_sampah"
                                   value="{{ old('jenis_sampah') }}"
                                   class="form-control @error('jenis_sampah') is-invalid @enderror" required>
                            @error('jenis_sampah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Berat --}}
                        <div class="mb-3">
                            <label for="berat" class="form-label fw-semibold">Berat (kg) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0.1" name="berat" id="berat"
                                   value="{{ old('berat') }}"
                                   class="form-control @error('berat') is-invalid @enderror" required>
                            @error('berat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Poin --}}
                        <div class="mb-3">
                            <label for="poin" class="form-label fw-semibold">Poin <span class="text-danger">*</span></label>
                            <input type="number" min="0" name="poin" id="poin"
                                   value="{{ old('poin') }}"
                                   class="form-control @error('poin') is-invalid @enderror" required>
                            @error('poin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">
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

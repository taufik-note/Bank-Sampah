@extends('layouts.app')

@section('content')
<div class="container py-5 bg-light" style="min-height: calc(100vh - 56px); overflow-x: hidden;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Transaksi Sampah</h4>
                </div>
                <div class="card-body p-4">
                    @if($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('transactions.update', $transaction) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')

                        {{-- Lokasi Drop Point --}}
                        <div class="mb-3">
                            <label for="drop_point_id" class="form-label fw-semibold">Lokasi Drop Point <span class="text-danger">*</span></label>
                            <select id="drop_point_id" name="drop_point_id" class="form-select @error('drop_point_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Lokasi --</option>
                                @foreach($dropPoints as $dp)
                                <option value="{{ $dp->id }}" {{ old('drop_point_id', $transaction->drop_point_id) == $dp->id ? 'selected' : '' }}>
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
                            <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $transaction->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jenis Sampah --}}
                        <div class="mb-3">
                            <label for="jenis_sampah" class="form-label fw-semibold">Jenis Sampah <span class="text-danger">*</span></label>
                            <input type="text" id="jenis_sampah" name="jenis_sampah" class="form-control @error('jenis_sampah') is-invalid @enderror" value="{{ old('jenis_sampah', $transaction->jenis_sampah) }}" required>
                            @error('jenis_sampah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Berat --}}
                        <div class="mb-3">
                            <label for="berat" class="form-label fw-semibold">Berat (kg) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0.1" id="berat" name="berat" class="form-control @error('berat') is-invalid @enderror" value="{{ old('berat', $transaction->berat) }}" required>
                            @error('berat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Poin --}}
                        <div class="mb-4">
                            <label for="poin" class="form-label fw-semibold">Poin <span class="text-danger">*</span></label>
                            <input type="number" min="0" id="poin" name="poin" class="form-control @error('poin') is-invalid @enderror" value="{{ old('poin', $transaction->poin) }}" required>
                            @error('poin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('transactions.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

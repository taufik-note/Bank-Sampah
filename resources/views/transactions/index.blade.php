@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">

            {{-- Judul --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                <h1 class="h3 fw-bold text-dark mb-3 mb-md-0">
                    ♻️ Daftar Transaksi Sampah
                </h1>
                <a href="{{ route('transactions.create') }}" class="btn btn-success shadow-sm">
                    ➕ Tambah Transaksi
                </a>
            </div>

            {{-- Filter Form --}}
            <form method="GET" action="{{ route('transactions.index') }}" class="row g-3 mb-4">
                <div class="col-md-5">
                    <select name="drop_point_id" class="form-select">
                        <option value="">-- Filter Lokasi Drop Point --</option>
                        @foreach($dropPoints as $dp)
                            <option value="{{ $dp->id }}" {{ request('drop_point_id') == $dp->id ? 'selected' : '' }}>
                                {{ $dp->nama_lokasi }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="form-control" />
                </div>
                <div class="col-md-3 d-grid">
                    <button type="submit" class="btn btn-primary">
                        🔍 Filter
                    </button>
                </div>
            </form>

            {{-- Notifikasi --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ✅ {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Tabel Data --}}
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Lokasi Drop Point</th>
                            <th scope="col">Jenis Sampah</th>
                            <th scope="col" class="text-end">Berat (kg)</th>
                            <th scope="col" class="text-end">Poin</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $t)
                        <tr>
                            <td>{{ $t->tanggal->format('Y-m-d') }}</td>
                            <td>{{ $t->dropPoint->nama_lokasi ?? '-' }}</td>
                            <td>{{ $t->jenis_sampah }}</td>
                            <td class="text-end">{{ number_format($t->berat, 2) }}</td>
                            <td class="text-end">{{ $t->poin }}</td>
                            <td class="text-center">
                                <a href="{{ route('transactions.edit', $t) }}" class="btn btn-warning btn-sm me-2">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('transactions.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus transaksi ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5 fw-semibold">
                                Data transaksi tidak ditemukan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $transactions->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

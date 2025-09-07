@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">

            {{-- Header --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                <h1 class="h3 fw-bold mb-3 mb-md-0">
                    📍 Daftar Drop Points
                </h1>
                <a href="{{ route('drop-points.create') }}" class="btn btn-success shadow-sm">
                    ➕ Tambah Drop Point
                </a>
            </div>

            {{-- Form Pencarian --}}
            <form method="GET" action="{{ route('drop-points.index') }}" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}"
                           class="form-control" placeholder="🔍 Cari nama lokasi...">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>

            {{-- Alert --}}
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
                            <th scope="col">Nama Lokasi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Koordinat</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dropPoints as $dp)
                        <tr>
                            <td class="fw-semibold">{{ $dp->nama_lokasi }}</td>
                            <td>{{ $dp->alamat ?? '—' }}</td>
                            <td>
                                @if($dp->koordinat)
                                    <span class="badge bg-primary">{{ $dp->koordinat }}</span>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('drop-points.edit', $dp) }}" class="btn btn-warning btn-sm me-2">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('drop-points.destroy', $dp) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus drop point ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-5">
                                Tidak ada data drop point
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $dropPoints->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

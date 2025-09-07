@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 fw-bold text-primary">🌱 Dashboard Bank Sampah & Daur Ulang</h1>
    
    {{-- Statistik Ringkas --}}
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-gradient bg-success text-white text-center p-4">
                <h2 class="h1 fw-bold mb-2">{{ $dropPointsCount ?? 0 }}</h2>
                <p class="mb-0 fw-semibold">Total Drop Point</p>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-gradient bg-primary text-white text-center p-4">
                <h2 class="h1 fw-bold mb-2">{{ $transactionsCount ?? 0 }}</h2>
                <p class="mb-0 fw-semibold">Total Transaksi</p>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-gradient bg-warning text-dark text-center p-4">
                <h2 class="h1 fw-bold mb-2">{{ $totalWeight ?? 0 }} Kg</h2>
                <p class="mb-0 fw-semibold">Sampah Terkumpul</p>
            </div>
        </div>
    </div>

    {{-- Menu Navigasi --}}
    <div class="row g-4 justify-content-center">
        <!-- Drop Points Card -->
        <div class="col-12 col-md-6">
            <a href="{{ route('drop-points.index') }}" class="text-decoration-none">
                <div class="card shadow-lg border-0 h-100 text-white bg-success rounded-4 position-relative overflow-hidden">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h2 class="card-title h4 d-flex align-items-center gap-3">
                                <i class="bi bi-geo-alt-fill fs-2"></i>
                                Drop Points
                            </h2>
                            <p class="card-text fs-6">Kelola lokasi drop point sampah agar distribusi daur ulang lebih efektif.</p>
                        </div>
                        <div class="mt-4 fw-semibold fs-5 text-white opacity-75">Mulai Kelola &rarr;</div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Transaksi Sampah Card -->
        <div class="col-12 col-md-6">
            <a href="{{ route('transactions.index') }}" class="text-decoration-none">
                <div class="card shadow-lg border-0 h-100 text-white bg-primary rounded-4 position-relative overflow-hidden">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h2 class="card-title h4 d-flex align-items-center gap-3">
                                <i class="bi bi-arrow-repeat fs-2"></i>
                                Transaksi Sampah
                            </h2>
                            <p class="card-text fs-6">Catat transaksi penukaran sampah serta poin yang diperoleh dengan mudah.</p>
                        </div>
                        <div class="mt-4 fw-semibold fs-5 text-white opacity-75">Mulai Catat &rarr;</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

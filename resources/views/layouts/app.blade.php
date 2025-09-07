<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>{{ config('app.name', 'Bank Sampah') }}</title>

   <!-- Bootstrap 5 CSS CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

   <!-- Custom CSS -->
   <style>
       body {
           font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       }
       .navbar {
           box-shadow: 0 4px 10px rgba(0,0,0,0.1);
       }
       .navbar-brand {
           font-weight: 700;
           letter-spacing: 0.5px;
       }
       main {
           min-height: calc(100vh - 56px - 60px); /* navbar + footer height */
       }
       footer {
           background: linear-gradient(135deg, #007bff, #0056b3);
           font-size: 0.9rem;
       }
   </style>

   <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
       <div class="container">
           <a class="navbar-brand" href="{{ route('dashboard') }}">
               <i class="bi bi-recycle me-1"></i> Bank Sampah
           </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ms-auto">
                   @auth
                       <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i class="bi bi-house-door me-1"></i>Dashboard</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ route('drop-points.index') }}"><i class="bi bi-geo-alt me-1"></i>Drop Points</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ route('transactions.index') }}"><i class="bi bi-cash-coin me-1"></i>Transaksi Sampah</a></li>
                       <li class="nav-item">
                           <form method="POST" action="{{ route('logout') }}">
                               @csrf
                               <button type="submit" class="btn btn-link nav-link" style="padding: 0; border: none;">
                                   <i class="bi bi-box-arrow-right me-1"></i>Logout
                               </button>
                           </form>
                       </li>
                   @else
                       <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-1"></i>Login</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-plus me-1"></i>Register</a></li>
                   @endauth
               </ul>
           </div>
       </div>
   </nav>

   <!-- Main Content -->
   <main class="flex-grow container py-4">
       @yield('content')
   </main>

   <!-- Footer -->
   <footer class="text-white text-center py-3 mt-auto shadow-lg">
       &copy; {{ date('Y') }} <strong>Bank Sampah & Daur Ulang</strong>. All rights reserved.
   </footer>

   <!-- Bootstrap 5 JS Bundle -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Bootstrap Icons -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>

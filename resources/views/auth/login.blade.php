<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Bank Sampah</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h2 class="mb-4 text-center">Login ke Bank Sampah</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" id="email" class="form-control" required autofocus value="{{ old('email') }}" />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required />
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="remember" id="remember" class="form-check-input" />
                <label for="remember" class="form-check-label">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <p class="text-center mt-3">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar di sini</a>
        </p>
    </div>

    <!-- Bootstrap JS CDN (optional, if using JS components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

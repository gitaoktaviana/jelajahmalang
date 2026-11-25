<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --jm-primary: #2D6A4F;
            --jm-secondary: #74C69D;
            --jm-accent: #F77F00;
            --jm-bg: #FAF7F0;
            --jm-text: #1B1B1B;
        }
        body { font-family: 'Inter', sans-serif; background: var(--jm-bg); color: var(--jm-text); }
        h1, h2, h3, h4, h5, .navbar-brand { font-family: 'Poppins', sans-serif; }
        .navbar-jm { background: var(--jm-primary); }
        .navbar-jm .nav-link { color: #fff; opacity: .9; }
        .navbar-jm .nav-link:hover { opacity: 1; color: var(--jm-secondary); }
        .btn-accent { background: var(--jm-accent); color: #fff; border: 0; }
        .btn-accent:hover { background: #d96f00; color: #fff; }
        .btn-outline-jm { border: 2px solid #fff; color: #fff; }
        .btn-outline-jm:hover { background: #fff; color: var(--jm-primary); }
        .hero { background: linear-gradient(135deg, var(--jm-primary), #1B4332); color: #fff; padding: 6rem 0; }
        .text-jm { color: var(--jm-primary); }
        .card-jm { border: 0; border-radius: 14px; box-shadow: 0 2px 10px rgba(0,0,0,.07); overflow: hidden; height: 100%; }
        .card-jm .cover { height: 180px; background: linear-gradient(135deg, var(--jm-secondary), var(--jm-primary)); object-fit: cover; width: 100%; }
        .badge-jm { background: var(--jm-secondary); color: #1B4332; }
        footer { background: #1B4332; color: #d8f3dc; }
    </style>
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark navbar-jm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">🌿 {{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('destinations.index') }}">Destinasi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('galleries.index') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Artikel</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                <li class="nav-item ms-lg-2"><a class="btn btn-accent btn-sm px-3" href="#">Daftar</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="flex-grow-1">
    @yield('content')
</main>

<footer class="py-4 mt-5">
    <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
        <span>&copy; {{ date('Y') }} {{ config('app.name') }}. Portal wisata Malang Raya.</span>
        <span>Project UAS Pemrograman Web II</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
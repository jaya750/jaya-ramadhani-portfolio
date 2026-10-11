@php
    $profil = config('portofolio.profil');
    $menu = config('portofolio.menu');
    $dasar = request()->routeIs('home') ? '' : route('home');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', $profil['nama'] . ' | Portofolio')</title>
    <meta name="description" content="@yield('deskripsi', 'Portofolio ' . $profil['nama'] . ', mahasiswa Sistem Informasi dan freelancer.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="navbar" id="navbar">
        <div class="container nav-inner">
            <a href="{{ $dasar }}#beranda" class="logo">{{ $profil['nama'] }}<span>.</span></a>

            <button class="menu-toggle" id="menu-toggle" aria-label="Buka menu" aria-expanded="false" aria-controls="menu">
                <span></span><span></span><span></span>
            </button>

            <nav class="menu" id="menu">
                @foreach ($menu as $id => $label)
                    <a href="{{ $dasar }}#{{ $id }}">{{ $label }}</a>
                @endforeach
            </nav>
        </div>
    </header>

    <main>
        @yield('konten')
    </main>

    <footer class="footer">
        <div class="container">
            <nav class="footer-menu" aria-label="Navigasi footer">
                @foreach ($menu as $id => $label)
                    <a href="{{ $dasar }}#{{ $id }}">{{ $label }}</a>
                @endforeach
            </nav>
            <p>&copy; {{ date('Y') }} {{ $profil['nama'] }}. Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
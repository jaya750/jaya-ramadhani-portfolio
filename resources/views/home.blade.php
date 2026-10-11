@php
    $profil = [
        'nama'     => 'Jaya Ramadhani',
        'email'    => 'jayaramadhani76@gmail.com',
        'wa_tampil'=> '0821-5525-9256',
        'wa_link'  => 'https://wa.me/6282155259256',
        'kampus'   => 'Universitas Islam Kalimantan Muhammad Arsyad Al-Banjari',
        'prodi'    => 'Sistem Informasi',
    ];

    // Catatan: isi keahlian di bawah masih umum. Ganti sesuai kemampuan Anda yang sebenarnya.
    $keahlian = [
        ['judul' => 'Sistem Informasi',      'isi' => 'Analisis kebutuhan dan perancangan sistem informasi.'],
        ['judul' => 'Pengembangan Website',  'isi' => 'Membangun website yang rapi, cepat, dan mudah digunakan.'],
        ['judul' => 'Desain Responsif',      'isi' => 'Tampilan yang nyaman di HP, tablet, laptop, dan desktop.'],
        ['judul' => 'Kerja Freelance',       'isi' => 'Komunikasi jelas dan pengerjaan proyek sesuai kebutuhan klien.'],
    ];

    $proyek = [
        ['nama' => 'SIMRS',            'inisial' => 'SR', 'isi' => 'Sistem informasi untuk mendukung pengelolaan data dan layanan rumah sakit.'],
        ['nama' => 'Monitoring Sampah','inisial' => 'MS', 'isi' => 'Sistem pemantauan data pengelolaan sampah.'],
        ['nama' => 'Absensi Online',   'inisial' => 'AO', 'isi' => 'Sistem pencatatan kehadiran secara online.'],
        ['nama' => 'SIM-TAK',          'inisial' => 'ST', 'isi' => 'Proyek sistem informasi. Deskripsi lengkap akan ditambahkan.'],
    ];

    $menu = [
        'beranda' => 'Beranda',
        'tentang' => 'Tentang',
        'keahlian'=> 'Keahlian',
        'proyek'  => 'Proyek',
        'kontak'  => 'Kontak',
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profil['nama'] }} | Portofolio</title>
    <meta name="description" content="Portofolio {{ $profil['nama'] }}, mahasiswa Sistem Informasi dan freelancer.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="navbar" id="navbar">
        <div class="container nav-inner">
            <a href="#beranda" class="logo">{{ $profil['nama'] }}<span>.</span></a>

            <button class="menu-toggle" id="menu-toggle" aria-label="Buka menu" aria-expanded="false" aria-controls="menu">
                <span></span><span></span><span></span>
            </button>

            <nav class="menu" id="menu">
                @foreach ($menu as $id => $label)
                    <a href="#{{ $id }}">{{ $label }}</a>
                @endforeach
            </nav>
        </div>
    </header>

    <main>
        <section class="hero" id="beranda">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
            <div class="container hero-inner">
                <p class="hero-sapa">Halo, saya</p>
                <h1>{{ $profil['nama'] }}</h1>
                <p class="hero-peran">Mahasiswa {{ $profil['prodi'] }} &amp; Freelancer</p>
                <p class="hero-desk">Saya membuat solusi digital yang modern, rapi, dan mudah digunakan.</p>
                <div class="hero-aksi">
                    <a href="#proyek" class="btn btn-utama">Lihat Proyek</a>
                    <a href="#kontak" class="btn btn-garis">Hubungi Saya</a>
                </div>
            </div>
        </section>

        <section class="section" id="tentang">
            <div class="container">
                <h2 class="judul">Tentang Saya</h2>
                <div class="tentang-grid">
                    <div class="avatar" aria-hidden="true">JR</div>
                    <div>
                        <p>Saya {{ $profil['nama'] }}, mahasiswa program studi {{ $profil['prodi'] }} di {{ $profil['kampus'] }}.</p>
                        <p>Saya menerima pekerjaan freelance dan senang mengubah kebutuhan menjadi sistem yang berguna.</p>
                        <ul class="info">
                            <li><strong>Universitas</strong> {{ $profil['kampus'] }}</li>
                            <li><strong>Program Studi</strong> {{ $profil['prodi'] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-abu" id="keahlian">
            <div class="container">
                <h2 class="judul">Keahlian</h2>
                <div class="grid grid-4">
                    @foreach ($keahlian as $item)
                        <article class="kartu">
                            <div class="nomor">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                            <h3>{{ $item['judul'] }}</h3>
                            <p>{{ $item['isi'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section" id="proyek">
            <div class="container">
                <h2 class="judul">Proyek</h2>
                <div class="grid grid-2">
                    @foreach ($proyek as $p)
                        <article class="kartu proyek">
                            <div class="thumb" aria-hidden="true">{{ $p['inisial'] }}</div>
                            <div class="proyek-isi">
                                <h3>{{ $p['nama'] }}</h3>
                                <p>{{ $p['isi'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section section-abu" id="kontak">
            <div class="container kontak">
                <h2 class="judul">Kontak</h2>
                <p>Tertarik bekerja sama? Hubungi saya melalui:</p>
                <div class="kontak-aksi">
                    <a class="btn btn-utama" href="mailto:{{ $profil['email'] }}">{{ $profil['email'] }}</a>
                    <a class="btn btn-garis" href="{{ $profil['wa_link'] }}" target="_blank" rel="noopener">WhatsApp {{ $profil['wa_tampil'] }}</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} {{ $profil['nama'] }}. Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
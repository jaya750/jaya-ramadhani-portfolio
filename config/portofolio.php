<?php

return [

    'profil' => [
        'nama'      => 'Jaya Ramadhani',
        'email'     => 'jayaramadhani76@gmail.com',
        'wa_tampil' => '0821-5525-9256',
        'wa_link'   => 'https://wa.me/6282155259256',
        'kampus'    => 'Universitas Islam Kalimantan Muhammad Arsyad Al-Banjari',
        'prodi'     => 'Sistem Informasi',
        'foto'      => 'FotoSaya', // nama file di public/images tanpa ekstensi
    ],

    'menu' => [
        'beranda'  => 'Beranda',
        'tentang'  => 'Tentang',
        'keahlian' => 'Keahlian',
        'proyek'   => 'Proyek',
        'kontak'   => 'Kontak',
    ],

    // Ganti sesuai kemampuan Anda yang sebenarnya.
    'keahlian' => [
        ['judul' => 'Sistem Informasi',     'isi' => 'Analisis kebutuhan dan perancangan sistem informasi.'],
        ['judul' => 'Pengembangan Website', 'isi' => 'Membangun website yang rapi, cepat, dan mudah digunakan.'],
        ['judul' => 'Desain Responsif',     'isi' => 'Tampilan yang nyaman di HP, tablet, laptop, dan desktop.'],
        ['judul' => 'Kerja Freelance',      'isi' => 'Komunikasi jelas dan pengerjaan proyek sesuai kebutuhan klien.'],
    ],

    /*
     | Bagian yang null / array kosong otomatis disembunyikan di halaman detail.
     | 'gambar'      = nama file sampul di public/images (tanpa ekstensi).
     | 'galeri_pola' = pola nama file untuk slider, mis. '*-simrs-*' (diurutkan menurut angka di akhir nama).
     | 'galeri_judul'= keterangan tiap foto sesuai urutan.
     */
    'proyek' => [
        [
            'slug'         => 'simrs',
            'nama'         => 'SIMRS',
            'inisial'      => 'SR',
            'kategori'     => 'Sistem Informasi Kesehatan',
            'gambar'       => 'dashboard-simrs-2',
            'galeri_pola'  => '*-simrs-*',
            'galeri_judul' => [
                'Halaman Login',
                'Dashboard',
                'Kelola Dokter',
                'Kelola Pasien',
                'Kelola Poli',
                'Kelola Jadwal',
                'Kelola Obat',
                'User dan Hak Akses',
            ],
            'ringkas'      => 'Sistem informasi berbasis web yang dirancang untuk membantu pengelolaan informasi dan administrasi rumah sakit agar lebih terstruktur, mudah diakses, dan efisien.',
            'latar'        => 'Pengelolaan informasi rumah sakit membutuhkan pencatatan data yang terorganisasi agar proses administrasi dan pencarian informasi dapat dilakukan dengan lebih mudah. Sistem informasi berbasis web dapat membantu mengintegrasikan data sesuai kebutuhan operasional.',
            'tujuan'       => [
                'Mempermudah pengelolaan data rumah sakit.',
                'Membantu pencatatan informasi secara terstruktur.',
                'Memudahkan pencarian dan pengelolaan data.',
                'Mendukung proses administrasi yang lebih efektif.',
            ],
            'masalah'      => null,
            'fitur'        => [
                'Login pengguna',
                'Dashboard',
                'Pengelolaan data dokter',
                'Pengelolaan data pasien',
                'Pengelolaan data poli',
                'Pengelolaan jadwal',
                'Pengelolaan data obat',
                'Pengelolaan user dan hak akses',
            ],
            'teknologi'    => [],
            'peran'        => null,
            'hasil'        => 'Menghasilkan aplikasi berbasis web untuk mendukung pengelolaan informasi rumah sakit sesuai fitur yang telah diimplementasikan.',
            'demo'         => null,
        ],
        [
            'slug'         => 'monitoring-sampah',
            'nama'         => 'Monitoring Sampah',
            'inisial'      => 'MS',
            'kategori'     => 'Sistem Monitoring Lingkungan',
            'gambar'       => 'monitoring-sampah',
            'galeri_pola'  => null,
            'galeri_judul' => [],
            'ringkas'      => 'Sistem berbasis web untuk mendukung pencatatan dan pemantauan informasi pengelolaan sampah agar data lebih terorganisasi dan mudah ditinjau.',
            'latar'        => 'Pengelolaan sampah memerlukan informasi yang tertata agar data dapat dipantau dan digunakan sebagai bahan evaluasi. Pencatatan secara digital dapat membantu mempermudah proses pengelolaan informasi.',
            'tujuan'       => [
                'Membantu pencatatan informasi sampah.',
                'Mempermudah pemantauan data yang tersedia.',
                'Menyajikan informasi secara terstruktur.',
            ],
            'masalah'      => null,
            'fitur'        => [],
            'teknologi'    => [],
            'peran'        => null,
            'hasil'        => 'Menghasilkan sistem monitoring berbasis web untuk membantu pengelolaan informasi sampah sesuai ruang lingkup aplikasi.',
            'demo'         => null,
        ],
        [
            'slug'         => 'absensi-online',
            'nama'         => 'Absensi Online',
            'inisial'      => 'AO',
            'kategori'     => 'Sistem Informasi Kehadiran',
            'gambar'       => 'absensi',
            'galeri_pola'  => null,
            'galeri_judul' => [],
            'ringkas'      => 'Aplikasi berbasis web yang dirancang untuk mendukung pencatatan kehadiran secara digital serta memudahkan pengelolaan dan pemeriksaan data absensi.',
            'latar'        => 'Pencatatan kehadiran membutuhkan proses yang teratur agar data masuk, pulang, dan riwayat kehadiran mudah diperiksa. Sistem digital dapat membantu mengurangi ketergantungan pada pencatatan manual.',
            'tujuan'       => [
                'Mendukung pencatatan kehadiran secara digital.',
                'Mempermudah pemeriksaan riwayat absensi.',
                'Membantu pengelolaan data kehadiran.',
            ],
            'masalah'      => null,
            'fitur'        => [],
            'teknologi'    => [],
            'peran'        => null,
            'hasil'        => 'Menghasilkan aplikasi absensi berbasis web sesuai fitur pencatatan kehadiran yang tersedia dalam sistem.',
            'demo'         => null,
        ],
        [
            'slug'         => 'sim-tak',
            'nama'         => 'SIM-TAK',
            'inisial'      => 'ST',
            'kategori'     => 'Sistem Informasi Manajemen Tugas',
            'gambar'       => 'simtak',
            'galeri_pola'  => null,
            'galeri_judul' => [],
            'ringkas'      => 'Aplikasi berbasis web untuk membantu pengelolaan tugas peserta magang atau PKL, pemantauan progres pekerjaan, serta proses evaluasi oleh pembimbing.',
            'latar'        => 'Pengelolaan tugas magang memerlukan komunikasi yang jelas antara pembimbing dan peserta. Tanpa pencatatan terstruktur, pemantauan progres, deadline, dan hasil pekerjaan dapat menjadi kurang terorganisasi.',
            'tujuan'       => [
                'Mempermudah pembagian tugas kepada peserta magang.',
                'Membantu peserta memperbarui progres pekerjaan.',
                'Memudahkan pembimbing memantau penyelesaian tugas.',
                'Mendukung proses review dan evaluasi pekerjaan.',
            ],
            'masalah'      => null,
            'fitur'        => [
                'Pengelolaan tugas dan deadline',
                'Pembaruan status dan persentase progres',
                'Catatan perkembangan pekerjaan',
                'Proses review dan revisi',
            ],
            'teknologi'    => ['Laravel', 'PHP'],
            'peran'        => null,
            'hasil'        => null,
            'demo'         => null,
        ],
    ],

];
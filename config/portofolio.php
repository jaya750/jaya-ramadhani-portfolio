<?php

return [

    'profil' => [
        'nama'      => 'Jaya Ramadhani',
        'email'     => 'jayaramadhani76@gmail.com',
        'wa_tampil' => '0821-5525-9256',
        'wa_link'   => 'https://wa.me/6282155259256',
        'kampus'    => 'Universitas Islam Kalimantan Muhammad Arsyad Al-Banjari',
        'prodi'     => 'Sistem Informasi',
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
     | Isi detail yang masih null / array kosong akan tampil sebagai teks netral.
     | 'gambar' = nama file di public/images TANPA ekstensi (dicari otomatis).
     | 'galeri' = daftar nama file tambahan di public/images tanpa ekstensi.
     */
    'proyek' => [
        [
            'slug'         => 'simrs',
            'nama'         => 'SIMRS',
            'inisial'      => 'SR',
            'kategori'     => 'Sistem Informasi Kesehatan',
            'gambar'       => 'simrs',
            'ringkas'      => 'Sistem informasi berbasis web untuk membantu pengelolaan informasi dan kegiatan administrasi rumah sakit.',
            'latar_tujuan' => null,
            'masalah'      => null,
            'fitur'        => [],
            'teknologi'    => [],
            'galeri'       => [],
            'peran'        => null,
            'hasil'        => null,
            'demo'         => null,
        ],
        [
            'slug'         => 'monitoring-sampah',
            'nama'         => 'Monitoring Sampah',
            'inisial'      => 'MS',
            'kategori'     => 'Sistem Monitoring Lingkungan',
            'gambar'       => 'monitoring-sampah',
            'ringkas'      => 'Sistem berbasis web untuk membantu pencatatan atau pemantauan informasi pengelolaan sampah.',
            'latar_tujuan' => null,
            'masalah'      => null,
            'fitur'        => [],
            'teknologi'    => [],
            'galeri'       => [],
            'peran'        => null,
            'hasil'        => null,
            'demo'         => null,
        ],
        [
            'slug'         => 'absensi-online',
            'nama'         => 'Absensi Online',
            'inisial'      => 'AO',
            'kategori'     => 'Sistem Informasi Kehadiran',
            'gambar'       => 'absensi',
            'ringkas'      => 'Sistem berbasis web untuk mendukung pencatatan kehadiran secara digital.',
            'latar_tujuan' => null,
            'masalah'      => null,
            'fitur'        => [],
            'teknologi'    => [],
            'galeri'       => [],
            'peran'        => null,
            'hasil'        => null,
            'demo'         => null,
        ],
        [
            'slug'         => 'sim-tak',
            'nama'         => 'SIM-TAK',
            'inisial'      => 'ST',
            'kategori'     => 'Sistem Informasi Manajemen Tugas',
            'gambar'       => 'simtak',
            'ringkas'      => 'Sistem berbasis web untuk membantu pengelolaan tugas peserta magang atau PKL, pemantauan progres, dan evaluasi oleh pembimbing.',
            'latar_tujuan' => 'Membantu pengelolaan tugas peserta magang atau PKL, pemantauan progres pengerjaan, dan evaluasi oleh pembimbing.',
            'masalah'      => null,
            'fitur'        => [],
            'teknologi'    => ['Laravel'],
            'galeri'       => [],
            'peran'        => null,
            'hasil'        => null,
            'demo'         => null,
        ],
    ],

];
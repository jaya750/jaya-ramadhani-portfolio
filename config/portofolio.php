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

    'keahlian' => [
        'judul' => 'Keahlian Saya',
        'intro' => 'Saya memiliki minat dalam pengembangan aplikasi web, pengelolaan database, analisis dan perancangan sistem, serta konsultasi Sistem Informasi Manajemen. Saya berfokus pada pengembangan solusi digital yang terstruktur untuk mendukung kebutuhan pengguna, meningkatkan efisiensi proses bisnis, dan membantu pengambilan keputusan berbasis informasi.',
        'item'  => [
            [
                'judul' => 'Web Development',
                'sub'   => 'Pengembangan Aplikasi Web',
                'label' => 'Teknologi',
                'tag'   => ['PHP', 'Laravel', 'HTML', 'CSS', 'JavaScript'],
                'isi'   => 'Membangun aplikasi web yang fungsional dan responsif, termasuk dashboard, autentikasi pengguna, pengelolaan data berbasis CRUD (Create, Read, Update, Delete), serta penerapan hak akses berdasarkan peran pengguna.',
            ],
            [
                'judul' => 'Database Management',
                'sub'   => 'Pengelolaan Basis Data',
                'label' => 'Teknologi dan Kompetensi',
                'tag'   => ['MySQL', 'SQL', 'ERD', 'Database Design'],
                'isi'   => 'Merancang dan mengelola struktur database, menentukan relasi antartabel, menyusun query SQL, serta mengoptimalkan pengelolaan data untuk mendukung kebutuhan aplikasi dan sistem informasi.',
            ],
            [
                'judul' => 'System Analysis & Design',
                'sub'   => 'Analisis dan Perancangan Sistem',
                'label' => 'Metode dan Kompetensi',
                'tag'   => ['UML', 'Flowchart', 'Requirements Analysis'],
                'isi'   => 'Menganalisis kebutuhan pengguna, memetakan proses bisnis, menyusun alur kerja sistem, dan merancang model sistem informasi sebagai dasar pengembangan aplikasi yang sesuai dengan kebutuhan organisasi.',
            ],
            [
                'judul' => 'Management Information Systems Consulting',
                'sub'   => 'Konsultasi Sistem Informasi Manajemen',
                'label' => null,
                'tag'   => [],
                'isi'   => 'Menganalisis kebutuhan organisasi, mengevaluasi proses bisnis, dan mengidentifikasi peluang pemanfaatan teknologi untuk meningkatkan efektivitas operasional, kualitas pengelolaan informasi, serta pengambilan keputusan manajemen.',
            ],
        ],
        'pendukung' => [
            ['judul' => 'Business Process Analysis', 'isi' => 'Menganalisis dan memetakan proses bisnis untuk mengidentifikasi kendala, kebutuhan, dan peluang perbaikan.'],
            ['judul' => 'Requirements Engineering', 'isi' => 'Mengidentifikasi, mendokumentasikan, dan menerjemahkan kebutuhan pengguna menjadi spesifikasi sistem yang terstruktur.'],
            ['judul' => 'Information Systems Design', 'isi' => 'Merancang model proses, struktur database, diagram UML, dan alur informasi sebagai dasar pengembangan sistem.'],
            ['judul' => 'Management Reporting & Decision Support', 'isi' => 'Merancang konsep laporan, dashboard, dan indikator kinerja untuk membantu pemantauan operasional serta mendukung pengambilan keputusan berbasis data.'],
        ],
    ],

    /*
     | 'galeri' = daftar [nama file tanpa ekstensi di public/images, keterangan], sesuai urutan slider.
     | Foto PERTAMA otomatis menjadi sampul kartu dan tampilan awal slider.
     | Bagian lain yang null / array kosong otomatis disembunyikan di halaman detail.
     */
    'proyek' => [
        [
            'slug'     => 'simrs',
            'nama'     => 'SIMRS',
            'inisial'  => 'SR',
            'kategori' => 'Sistem Informasi Kesehatan',
            'galeri'   => [
                ['Login-simrs-1',        'Halaman Login'],
                ['dashboard-simrs-2',    'Dashboard'],
                ['keloladokter-simrs-3', 'Kelola Dokter'],
                ['kelolapasien-simrs-4', 'Kelola Pasien'],
                ['kelolapoli-simrs-5',   'Kelola Poli'],
                ['kelolajadwal-simrs-6', 'Kelola Jadwal'],
                ['kelolaobat-simrs-7',   'Kelola Obat'],
                ['userhakakses-simrs-8', 'User dan Hak Akses'],
            ],
            'ringkas'  => 'Sistem informasi berbasis web yang dirancang untuk membantu pengelolaan informasi dan administrasi rumah sakit agar lebih terstruktur, mudah diakses, dan efisien.',
            'latar'    => 'Pengelolaan informasi rumah sakit membutuhkan pencatatan data yang terorganisasi agar proses administrasi dan pencarian informasi dapat dilakukan dengan lebih mudah. Sistem informasi berbasis web dapat membantu mengintegrasikan data sesuai kebutuhan operasional.',
            'tujuan'   => [
                'Mempermudah pengelolaan data rumah sakit.',
                'Membantu pencatatan informasi secara terstruktur.',
                'Memudahkan pencarian dan pengelolaan data.',
                'Mendukung proses administrasi yang lebih efektif.',
            ],
            'masalah'  => null,
            'fitur'    => [
                'Login pengguna',
                'Dashboard',
                'Pengelolaan data dokter',
                'Pengelolaan data pasien',
                'Pengelolaan data poli',
                'Pengelolaan jadwal',
                'Pengelolaan data obat',
                'Pengelolaan user dan hak akses',
            ],
            'teknologi' => [],
            'peran'    => null,
            'hasil'    => 'Menghasilkan aplikasi berbasis web untuk mendukung pengelolaan informasi rumah sakit sesuai fitur yang telah diimplementasikan.',
            'demo'     => null,
        ],
        [
            'slug'     => 'monitoring-sampah',
            'nama'     => 'Monitoring Sampah',
            'inisial'  => 'MS',
            'kategori' => 'Sistem Monitoring Lingkungan',
            'galeri'   => [
                ['Login-monitoring-sampah', 'Halaman Login'],
            ],
            'ringkas'  => 'Sistem berbasis web untuk mendukung pencatatan dan pemantauan informasi pengelolaan sampah agar data lebih terorganisasi dan mudah ditinjau.',
            'latar'    => 'Pengelolaan sampah memerlukan informasi yang tertata agar data dapat dipantau dan digunakan sebagai bahan evaluasi. Pencatatan secara digital dapat membantu mempermudah proses pengelolaan informasi.',
            'tujuan'   => [
                'Membantu pencatatan informasi sampah.',
                'Mempermudah pemantauan data yang tersedia.',
                'Menyajikan informasi secara terstruktur.',
            ],
            'masalah'  => null,
            'fitur'    => [],
            'teknologi' => [],
            'peran'    => null,
            'hasil'    => 'Menghasilkan sistem monitoring berbasis web untuk membantu pengelolaan informasi sampah sesuai ruang lingkup aplikasi.',
            'demo'     => null,
        ],
        [
            'slug'     => 'absensi-online',
            'nama'     => 'Absensi Online',
            'inisial'  => 'AO',
            'kategori' => 'Sistem Informasi Kehadiran',
            'galeri'   => [
                ['Login-Absensi',     'Halaman Login'],
                ['Dashboard-Absensi', 'Dashboard'],
                ['Karyawan-Absensi',  'Data Karyawan'],
                ['Laporan-Absensi',   'Laporan'],
                ['AuditLog-Absensi',  'Audit Log'],
            ],
            'ringkas'  => 'Aplikasi berbasis web yang dirancang untuk mendukung pencatatan kehadiran secara digital serta memudahkan pengelolaan dan pemeriksaan data absensi.',
            'latar'    => 'Pencatatan kehadiran membutuhkan proses yang teratur agar data masuk, pulang, dan riwayat kehadiran mudah diperiksa. Sistem digital dapat membantu mengurangi ketergantungan pada pencatatan manual.',
            'tujuan'   => [
                'Mendukung pencatatan kehadiran secara digital.',
                'Mempermudah pemeriksaan riwayat absensi.',
                'Membantu pengelolaan data kehadiran.',
            ],
            'masalah'  => null,
            'fitur'    => [
                'Login pengguna',
                'Dashboard',
                'Pengelolaan data karyawan',
                'Laporan',
                'Audit log',
            ],
            'teknologi' => [],
            'peran'    => null,
            'hasil'    => 'Menghasilkan aplikasi absensi berbasis web sesuai fitur pencatatan kehadiran yang tersedia dalam sistem.',
            'demo'     => null,
        ],
        [
            'slug'     => 'sim-tak',
            'nama'     => 'SIM-TAK',
            'inisial'  => 'ST',
            'kategori' => 'Sistem Informasi Manajemen Tugas',
            'galeri'   => [
                ['Login-Simtak',        'Halaman Login'],
                ['Dashboard-Simtak',    'Dashboard'],
                ['DataTugas-simtak',    'Data Tugas'],
                ['DataPengguna-simtak', 'Data Pengguna'],
                ['Plotting-Simtak',     'Plotting'],
                ['Laporan-simtak',      'Laporan'],
            ],
            'ringkas'  => 'Aplikasi berbasis web untuk membantu pengelolaan tugas peserta magang atau PKL, pemantauan progres pekerjaan, serta proses evaluasi oleh pembimbing.',
            'latar'    => 'Pengelolaan tugas magang memerlukan komunikasi yang jelas antara pembimbing dan peserta. Tanpa pencatatan terstruktur, pemantauan progres, deadline, dan hasil pekerjaan dapat menjadi kurang terorganisasi.',
            'tujuan'   => [
                'Mempermudah pembagian tugas kepada peserta magang.',
                'Membantu peserta memperbarui progres pekerjaan.',
                'Memudahkan pembimbing memantau penyelesaian tugas.',
                'Mendukung proses review dan evaluasi pekerjaan.',
            ],
            'masalah'  => null,
            'fitur'    => [
                'Login pengguna dan dashboard',
                'Pengelolaan tugas dan deadline',
                'Pengelolaan data pengguna',
                'Plotting',
                'Pembaruan status dan persentase progres',
                'Catatan perkembangan pekerjaan',
                'Proses review dan revisi',
                'Laporan',
            ],
            'teknologi' => ['Laravel', 'PHP'],
            'peran'    => null,
            'hasil'    => null,
            'demo'     => null,
        ],
    ],

];
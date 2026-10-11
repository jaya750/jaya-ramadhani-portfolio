document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');
    const tombol = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    /* ---------- Menu mobile ---------- */
    if (tombol && menu) {
        const tutup = () => {
            menu.classList.remove('buka');
            tombol.classList.remove('aktif');
            tombol.setAttribute('aria-expanded', 'false');
        };

        tombol.addEventListener('click', () => {
            const terbuka = menu.classList.toggle('buka');
            tombol.classList.toggle('aktif', terbuka);
            tombol.setAttribute('aria-expanded', String(terbuka));
        });

        menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', tutup));

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) tutup();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') tutup();
        });
    }

    /* ---------- Bayangan navbar saat scroll ---------- */
    if (navbar) {
        let menunggu = false;
        const cek = () => {
            navbar.classList.toggle('bayangan', window.scrollY > 10);
            menunggu = false;
        };
        window.addEventListener(
            'scroll',
            () => {
                if (!menunggu) {
                    menunggu = true;
                    requestAnimationFrame(cek);
                }
            },
            { passive: true }
        );
        cek();
    }

    /* ---------- Gambar proyek gagal dimuat: tampilkan pengganti ---------- */
    document.querySelectorAll('.thumb img').forEach((img) => {
        const sembunyi = () => img.classList.add('rusak');
        img.addEventListener('error', sembunyi);
        if (img.complete && img.naturalWidth === 0) sembunyi();
    });

    if (!('IntersectionObserver' in window)) return;

    /* ---------- Menu aktif sesuai bagian (hanya di halaman utama) ---------- */
    const links = [...document.querySelectorAll('.menu a')].filter((a) =>
        (a.getAttribute('href') || '').startsWith('#')
    );
    const bagian = links
        .map((a) => document.querySelector(a.getAttribute('href')))
        .filter(Boolean);

    if (bagian.length) {
        const spy = new IntersectionObserver(
            (entries) => {
                entries.forEach((e) => {
                    if (!e.isIntersecting) return;
                    links.forEach((a) =>
                        a.classList.toggle('aktif', a.getAttribute('href') === '#' + e.target.id)
                    );
                });
            },
            { rootMargin: '-45% 0px -50% 0px' }
        );
        bagian.forEach((s) => spy.observe(s));
    }

    /* ---------- Animasi muncul saat scroll ---------- */
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const tambah = (el, arah = '', jeda = 0) => {
        el.classList.add('reveal');
        if (arah) el.classList.add(arah);
        el.style.transitionDelay = jeda + 'ms';
        el.dataset.jeda = jeda;
        pengamat.observe(el);
    };

    const pengamat = new IntersectionObserver(
        (entries) => {
            entries.forEach((e) => {
                if (!e.isIntersecting) return;
                const el = e.target;
                el.classList.add('tampil');
                pengamat.unobserve(el);

                // Bersihkan kelas animasi agar efek hover tidak tertunda
                setTimeout(() => {
                    el.classList.remove('reveal', 'reveal-kiri', 'reveal-kanan', 'tampil');
                    el.style.transitionDelay = '';
                }, Number(el.dataset.jeda) + 1000);
            });
        },
        { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
    );

    document.querySelectorAll('.judul').forEach((el) => tambah(el));

    document.querySelectorAll('.grid').forEach((grid) => {
        [...grid.children].forEach((el, i) => tambah(el, '', i * 100));
    });

    const avatar = document.querySelector('.avatar');
    const teksTentang = document.querySelector('.tentang-grid > div:not(.avatar)');
    if (avatar) tambah(avatar, 'reveal-kiri');
    if (teksTentang) tambah(teksTentang, 'reveal-kanan', 150);

    document.querySelectorAll('.kontak > p, .kontak-aksi').forEach((el, i) => {
        tambah(el, '', i * 120);
    });

    /* Halaman detail proyek */
    document.querySelectorAll('.detail-blok').forEach((el, i) => tambah(el, '', Math.min(i, 4) * 80));
});
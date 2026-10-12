document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');
    const tombol = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const kurangiGerak = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const adaMouse = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    let menuTerbuka = false;
    let menunggu = false;

    /* ---------- Bilah progres scroll ---------- */
    const progres = document.createElement('div');
    progres.className = 'progres';
    progres.setAttribute('aria-hidden', 'true');
    document.body.appendChild(progres);

    /* ---------- Navbar: transparan di atas hero, solid saat scroll / menu terbuka ---------- */
    const perbaruiNavbar = () => {
        if (navbar) navbar.classList.toggle('solid', window.scrollY > 10 || menuTerbuka);

        const maks = document.documentElement.scrollHeight - window.innerHeight;
        progres.style.transform = 'scaleX(' + (maks > 0 ? Math.min(window.scrollY / maks, 1) : 0) + ')';
        menunggu = false;
    };

    window.addEventListener(
        'scroll',
        () => {
            if (!menunggu) {
                menunggu = true;
                requestAnimationFrame(perbaruiNavbar);
            }
        },
        { passive: true }
    );

    /* ---------- Menu mobile ---------- */
    if (tombol && menu) {
        const aturMenu = (buka) => {
            menuTerbuka = buka;
            menu.classList.toggle('buka', buka);
            tombol.classList.toggle('aktif', buka);
            tombol.setAttribute('aria-expanded', String(buka));
            perbaruiNavbar();
        };

        tombol.addEventListener('click', () => aturMenu(!menuTerbuka));
        menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => aturMenu(false)));

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && menuTerbuka) aturMenu(false);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && menuTerbuka) aturMenu(false);
        });
    }

    perbaruiNavbar();

    /* ---------- Gambar gagal dimuat: tampilkan pengganti (inisial) ---------- */
    document.querySelectorAll('.thumb img, .foto-bungkus img').forEach((img) => {
        const sembunyi = () => img.classList.add('rusak');
        img.addEventListener('error', sembunyi);
        if (img.complete && img.naturalWidth === 0) sembunyi();
    });

    /* ---------- Kartu: cahaya sorot mengikuti kursor + efek miring 3D ---------- */
    if (adaMouse) {
        document.querySelectorAll('.kartu').forEach((kartu) => {
            const miring = !kurangiGerak && kartu.closest('.grid') !== null;
            let rAF = 0;

            kartu.addEventListener('pointerenter', () => kartu.classList.add('miring'));

            kartu.addEventListener('pointermove', (e) => {
                if (rAF) return;
                rAF = requestAnimationFrame(() => {
                    rAF = 0;
                    const r = kartu.getBoundingClientRect();
                    const x = e.clientX - r.left;
                    const y = e.clientY - r.top;
                    kartu.style.setProperty('--mx', x + 'px');
                    kartu.style.setProperty('--my', y + 'px');

                    if (miring) {
                        const rx = (y / r.height - 0.5) * -8;
                        const ry = (x / r.width - 0.5) * 8;
                        kartu.style.transform =
                            'perspective(900px) rotateX(' + rx.toFixed(2) + 'deg) rotateY(' + ry.toFixed(2) + 'deg) translateY(-8px)';
                    }
                });
            });

            kartu.addEventListener('pointerleave', () => {
                if (rAF) {
                    cancelAnimationFrame(rAF);
                    rAF = 0;
                }
                kartu.classList.remove('miring');
                kartu.style.transform = '';
            });
        });
    }

    /* ---------- Slider foto proyek ---------- */
    document.querySelectorAll('[data-slider]').forEach((slider) => {
        const jalur = slider.querySelector('.slider-jalur');
        const slides = jalur ? [...jalur.children] : [];
        if (slides.length < 2) return;

        const prev = slider.querySelector('.slider-prev');
        const next = slider.querySelector('.slider-next');
        const wadahTitik = slider.querySelector('.slider-titik');
        const saat = slider.querySelector('[data-saat]');
        let aktif = 0;
        let antre = false;

        function pergi(i) {
            const target = slides[Math.max(0, Math.min(slides.length - 1, i))];
            jalur.scrollTo({ left: target.offsetLeft, behavior: kurangiGerak ? 'auto' : 'smooth' });
        }

        const titik = slides.map((_, i) => {
            const b = document.createElement('button');
            b.type = 'button';
            b.setAttribute('aria-label', 'Ke foto ' + (i + 1));
            b.addEventListener('click', () => pergi(i));
            if (wadahTitik) wadahTitik.appendChild(b);
            return b;
        });

        function perbarui() {
            let terdekat = 0;
            let selisih = Infinity;
            slides.forEach((s, i) => {
                const d = Math.abs(s.offsetLeft - jalur.scrollLeft);
                if (d < selisih) {
                    selisih = d;
                    terdekat = i;
                }
            });
            aktif = terdekat;
            titik.forEach((t, i) => {
                t.classList.toggle('aktif', i === aktif);
                if (i === aktif) t.setAttribute('aria-current', 'true');
                else t.removeAttribute('aria-current');
            });
            if (saat) saat.textContent = String(aktif + 1);
            if (prev) prev.disabled = aktif === 0;
            if (next) next.disabled = aktif === slides.length - 1;
            antre = false;
        }

        jalur.addEventListener(
            'scroll',
            () => {
                if (!antre) {
                    antre = true;
                    requestAnimationFrame(perbarui);
                }
            },
            { passive: true }
        );

        if (prev) prev.addEventListener('click', () => pergi(aktif - 1));
        if (next) next.addEventListener('click', () => pergi(aktif + 1));

        jalur.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                pergi(aktif - 1);
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                pergi(aktif + 1);
            }
        });

        window.addEventListener('resize', perbarui);
        perbarui();
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
    if (kurangiGerak) return;

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
        { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );

    document.querySelectorAll('.judul').forEach((el) => tambah(el));

    document.querySelectorAll('.grid').forEach((grid) => {
        [...grid.children].forEach((el, i) => tambah(el, '', i * 100));
    });

    document.querySelectorAll('.tentang-isi > *').forEach((el, i) => tambah(el, '', i * 100));

    document.querySelectorAll('.keahlian-intro, .pendukung').forEach((el) => tambah(el));

    document.querySelectorAll('.kontak > p, .kontak-aksi').forEach((el, i) => {
        tambah(el, '', i * 120);
    });

    /* Halaman detail proyek */
    document.querySelectorAll('.detail-blok').forEach((el, i) => tambah(el, '', Math.min(i, 4) * 80));
});
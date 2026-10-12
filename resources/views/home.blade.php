@extends('layouts.app')

@section('kelas', 'ber-hero')

@section('konten')
@php
    $profil = config('portofolio.profil');
    $ahli = config('portofolio.keahlian');

    // Logo resmi dari Simple Icons (CC0). Hapus satu entri jika ingin mengurangi lencana.
    $logo = [
        [
            'nama'  => 'MySQL',
            'warna' => '#4479A1',
            'path'  => 'M16.405 5.501c-.115 0-.193.014-.274.033v.013h.014c.054.104.146.18.214.273.054.107.1.214.154.32l.014-.015c.094-.066.14-.172.14-.333-.04-.047-.046-.094-.08-.14-.04-.067-.126-.1-.18-.153zM5.77 18.695h-.927a50.854 50.854 0 00-.27-4.41h-.008l-1.41 4.41H2.45l-1.4-4.41h-.01a72.892 72.892 0 00-.195 4.41H0c.055-1.966.192-3.81.41-5.53h1.15l1.335 4.064h.008l1.347-4.064h1.095c.242 2.015.384 3.86.428 5.53zm4.017-4.08c-.378 2.045-.876 3.533-1.492 4.46-.482.716-1.01 1.073-1.583 1.073-.153 0-.34-.046-.566-.138v-.494c.11.017.24.026.386.026.268 0 .483-.075.647-.222.197-.18.295-.382.295-.605 0-.155-.077-.47-.23-.944L6.23 14.615h.91l.727 2.36c.164.536.233.91.205 1.123.4-1.064.678-2.227.835-3.483zm12.325 4.08h-2.63v-5.53h.885v4.85h1.745zm-3.32.135l-1.016-.5c.09-.076.177-.158.255-.25.433-.506.648-1.258.648-2.253 0-1.83-.718-2.746-2.155-2.746-.704 0-1.254.232-1.65.697-.43.508-.646 1.256-.646 2.245 0 .972.19 1.686.574 2.14.35.41.877.615 1.583.615.264 0 .506-.033.725-.098l1.325.772.36-.622zM15.5 17.588c-.225-.36-.337-.94-.337-1.736 0-1.393.424-2.09 1.27-2.09.443 0 .77.167.977.5.224.362.336.936.336 1.723 0 1.404-.424 2.108-1.27 2.108-.445 0-.77-.167-.978-.5zm-1.658-.425c0 .47-.172.856-.516 1.156-.344.3-.803.45-1.384.45-.543 0-1.064-.172-1.573-.515l.237-.476c.438.22.833.328 1.19.328.332 0 .593-.073.783-.22a.754.754 0 00.3-.615c0-.33-.23-.61-.648-.845-.388-.213-1.163-.657-1.163-.657-.422-.307-.632-.636-.632-1.177 0-.45.157-.81.47-1.085.315-.278.72-.415 1.22-.415.512 0 .98.136 1.4.41l-.213.476a2.726 2.726 0 00-1.064-.23c-.283 0-.502.068-.654.206a.685.685 0 00-.248.524c0 .328.234.61.666.85.393.215 1.187.67 1.187.67.433.305.648.63.648 1.168zm9.382-5.852c-.535-.014-.95.04-1.297.188-.1.04-.26.04-.274.167.055.053.063.14.11.214.08.134.218.313.346.407.14.11.28.216.427.31.26.16.555.255.81.416.145.094.293.213.44.313.073.05.12.14.214.172v-.02c-.046-.06-.06-.147-.105-.214-.067-.067-.134-.127-.2-.193a3.223 3.223 0 00-.695-.675c-.214-.146-.682-.35-.77-.595l-.013-.014c.146-.013.32-.066.46-.106.227-.06.435-.047.67-.106.106-.027.213-.06.32-.094v-.06c-.12-.12-.21-.283-.334-.395a8.867 8.867 0 00-1.104-.823c-.21-.134-.476-.22-.697-.334-.08-.04-.214-.06-.26-.127-.12-.146-.19-.34-.275-.514a17.69 17.69 0 01-.547-1.163c-.12-.262-.193-.523-.34-.763-.69-1.137-1.437-1.826-2.586-2.5-.247-.14-.543-.2-.856-.274-.167-.008-.334-.02-.5-.027-.11-.047-.216-.174-.31-.235-.38-.24-1.364-.76-1.644-.072-.18.434.267.862.422 1.082.115.153.26.328.34.5.047.116.06.235.107.356.106.294.207.622.347.897.073.14.153.287.247.413.054.073.146.107.167.227-.094.136-.1.334-.154.5-.24.757-.146 1.693.194 2.25.107.166.362.534.703.393.3-.12.234-.5.32-.835.02-.08.007-.133.048-.187v.015c.094.188.188.367.274.555.206.328.566.668.867.895.16.12.287.328.487.402v-.02h-.015c-.043-.058-.1-.086-.154-.133a3.445 3.445 0 01-.35-.4 8.76 8.76 0 01-.747-1.218c-.11-.21-.202-.436-.29-.643-.04-.08-.04-.2-.107-.24-.1.146-.247.273-.32.453-.127.288-.14.642-.188 1.01-.027.007-.014 0-.027.014-.214-.052-.287-.274-.367-.46-.2-.475-.233-1.238-.06-1.785.047-.14.247-.582.167-.716-.042-.127-.174-.2-.247-.303a2.478 2.478 0 01-.24-.427c-.16-.374-.24-.788-.414-1.162-.08-.173-.22-.354-.334-.513-.127-.18-.267-.307-.368-.52-.033-.073-.08-.194-.027-.274.014-.054.042-.075.094-.09.088-.072.335.022.422.062.247.1.455.194.662.334.094.066.195.193.315.226h.14c.214.047.455.014.655.073.355.114.675.28.962.46a5.953 5.953 0 012.085 2.286c.08.154.115.295.188.455.14.33.313.663.455.982.14.315.275.636.476.897.1.14.502.213.682.286.133.06.34.115.46.188.23.14.454.3.67.454.11.076.443.243.463.378z',
        ],
        [
            'nama'  => 'Laravel',
            'warna' => '#FF2D20',
            'path'  => 'M23.642 5.43a.364.364 0 01.014.1v5.149c0 .135-.073.26-.189.326l-4.323 2.49v4.934a.378.378 0 01-.188.326L9.93 23.949a.316.316 0 01-.066.027c-.008.002-.016.008-.024.01a.348.348 0 01-.192 0c-.011-.002-.02-.008-.03-.012-.02-.008-.042-.014-.062-.025L.533 18.755a.376.376 0 01-.189-.326V2.974c0-.033.005-.066.014-.098.003-.012.01-.02.014-.032a.369.369 0 01.023-.058c.004-.013.015-.022.023-.033l.033-.045c.012-.01.025-.018.037-.027.014-.012.027-.024.041-.034H.53L5.043.05a.375.375 0 01.375 0L9.93 2.647h.002c.015.01.027.021.04.033l.038.027c.013.014.02.03.033.045.008.011.02.021.025.033.01.02.017.038.024.058.003.011.01.021.013.032.01.031.014.064.014.098v9.652l3.76-2.164V5.527c0-.033.004-.066.013-.098.003-.01.01-.02.013-.032a.487.487 0 01.024-.059c.007-.012.018-.02.025-.033.012-.015.021-.03.033-.043.012-.012.025-.02.037-.028.014-.01.026-.023.041-.032h.001l4.513-2.598a.375.375 0 01.375 0l4.513 2.598c.016.01.027.021.042.031.012.01.025.018.036.028.013.014.022.03.034.044.008.012.019.021.024.033.011.02.018.04.024.06.006.01.012.021.015.032zm-.74 5.032V6.179l-1.578.908-2.182 1.256v4.283zm-4.51 7.75v-4.287l-2.147 1.225-6.126 3.498v4.325zM1.093 3.624v14.588l8.273 4.761v-4.325l-4.322-2.445-.002-.003H5.04c-.014-.01-.025-.021-.04-.031-.011-.01-.024-.018-.035-.027l-.001-.002c-.013-.012-.021-.025-.031-.04-.01-.011-.021-.022-.028-.036h-.002c-.008-.014-.013-.031-.02-.047-.006-.016-.014-.027-.018-.043a.49.49 0 01-.008-.057c-.002-.014-.006-.027-.006-.041V5.789l-2.18-1.257zM5.23.81L1.47 2.974l3.76 2.164 3.758-2.164zm1.956 13.505l2.182-1.256V3.624l-1.58.91-2.182 1.255v9.435zm11.581-10.95l-3.76 2.163 3.76 2.163 3.759-2.164zm-.376 4.978L16.21 7.087 14.63 6.18v4.283l2.182 1.256 1.58.908zm-8.65 9.654l5.514-3.148 2.756-1.572-3.757-2.163-4.323 2.489-3.941 2.27z',
        ],
        [
            'nama'  => 'PHP',
            'warna' => '#777BB4',
            'path'  => 'M7.01 10.207h-.944l-.515 2.648h.838c.556 0 .97-.105 1.242-.314.272-.21.455-.559.55-1.049.092-.47.05-.802-.124-.995-.175-.193-.523-.29-1.047-.29zM12 5.688C5.373 5.688 0 8.514 0 12s5.373 6.313 12 6.313S24 15.486 24 12c0-3.486-5.373-6.312-12-6.312zm-3.26 7.451c-.261.25-.575.438-.917.551-.336.108-.765.164-1.285.164H5.357l-.327 1.681H3.652l1.23-6.326h2.65c.797 0 1.378.209 1.744.628.366.418.476 1.002.33 1.752a2.836 2.836 0 0 1-.305.847c-.143.255-.33.49-.561.703zm4.024.715l.543-2.799c.063-.318.039-.536-.068-.651-.107-.116-.336-.174-.687-.174H11.46l-.704 3.625H9.388l1.23-6.327h1.367l-.327 1.682h1.218c.767 0 1.295.134 1.586.401s.378.7.263 1.299l-.572 2.944h-1.389zm7.597-2.265a2.782 2.782 0 0 1-.305.847c-.143.255-.33.49-.561.703a2.44 2.44 0 0 1-.917.551c-.336.108-.765.164-1.286.164h-1.18l-.327 1.682h-1.378l1.23-6.326h2.649c.797 0 1.378.209 1.744.628.366.417.477 1.001.331 1.751zM17.766 10.207h-.943l-.516 2.648h.838c.557 0 .971-.105 1.242-.314.272-.21.455-.559.551-1.049.092-.47.049-.802-.125-.995s-.524-.29-1.047-.29z',
        ],
        [
            'nama'  => 'Python',
            'warna' => '#3776AB',
            'path'  => 'M14.25.18l.9.2.73.26.59.3.45.32.34.34.25.34.16.33.1.3.04.26.02.2-.01.13V8.5l-.05.63-.13.55-.21.46-.26.38-.3.31-.33.25-.35.19-.35.14-.33.1-.3.07-.26.04-.21.02H8.77l-.69.05-.59.14-.5.22-.41.27-.33.32-.27.35-.2.36-.15.37-.1.35-.07.32-.04.27-.02.21v3.06H3.17l-.21-.03-.28-.07-.32-.12-.35-.18-.36-.26-.36-.36-.35-.46-.32-.59-.28-.73-.21-.88-.14-1.05-.05-1.23.06-1.22.16-1.04.24-.87.32-.71.36-.57.4-.44.42-.33.42-.24.4-.16.36-.1.32-.05.24-.01h.16l.06.01h8.16v-.83H6.18l-.01-2.75-.02-.37.05-.34.11-.31.17-.28.25-.26.31-.23.38-.2.44-.18.51-.15.58-.12.64-.1.71-.06.77-.04.84-.02 1.27.05zm-6.3 1.98l-.23.33-.08.41.08.41.23.34.33.22.41.09.41-.09.33-.22.23-.34.08-.41-.08-.41-.23-.33-.33-.22-.41-.09-.41.09zm13.09 3.95l.28.06.32.12.35.18.36.27.36.35.35.47.32.59.28.73.21.88.14 1.04.05 1.23-.06 1.23-.16 1.04-.24.86-.32.71-.36.57-.4.45-.42.33-.42.24-.4.16-.36.09-.32.05-.24.02-.16-.01h-8.22v.82h5.84l.01 2.76.02.36-.05.34-.11.31-.17.29-.25.25-.31.24-.38.2-.44.17-.51.15-.58.13-.64.09-.71.07-.77.04-.84.01-1.27-.04-1.07-.14-.9-.2-.73-.25-.59-.3-.45-.33-.34-.34-.25-.34-.16-.33-.1-.3-.04-.25-.02-.2.01-.13v-5.34l.05-.64.13-.54.21-.46.26-.38.3-.32.33-.24.35-.2.35-.14.33-.1.3-.06.26-.04.21-.02.13-.01h5.84l.69-.05.59-.14.5-.21.41-.28.33-.32.27-.35.2-.36.15-.36.1-.35.07-.32.04-.28.02-.21V6.07h2.09l.14.01zm-6.47 14.25l-.23.33-.08.41.08.41.23.33.33.23.41.08.41-.08.33-.23.23-.33.08-.41-.08-.41-.23-.33-.33-.23-.41-.08-.41.08z',
        ],
    ];
@endphp

<section class="hero" id="beranda">
    <div class="hero-latar" aria-hidden="true">
        <span class="blob blob-1"></span>
        <span class="blob blob-2"></span>
        <span class="hias hias-1"></span>
        <span class="hias hias-2"></span>
        <span class="hias hias-3"></span>
    </div>

    <div class="container hero-inner">
        <div class="hero-foto">
            <div class="foto-cincin">
                <div class="foto-bungkus">
                    @if ($foto)
                        <img src="{{ $foto }}" alt="Foto {{ $profil['nama'] }}" fetchpriority="high" decoding="async">
                    @endif
                    <span class="inisial" aria-hidden="true">JR</span>
                </div>

                @foreach ($logo as $i => $l)
                    <span class="logo-tek lt-{{ $i + 1 }}" data-nama="{{ $l['nama'] }}" style="--warna: {{ $l['warna'] }}">
                        <svg viewBox="0 0 24 24" role="img" aria-label="{{ $l['nama'] }}"><path d="{{ $l['path'] }}" fill="{{ $l['warna'] }}"/></svg>
                    </span>
                @endforeach
            </div>
        </div>

        <div class="hero-teks">
            <p class="hero-sapa">Halo, saya</p>
            <h1>{{ $profil['nama'] }}</h1>
            <p class="hero-peran">Mahasiswa {{ $profil['prodi'] }} &amp; Freelancer</p>
            <p class="hero-desk">Saya membuat solusi digital yang modern, rapi, dan mudah digunakan.</p>
            <div class="hero-aksi">
                <a href="#proyek" class="btn btn-aksen">Lihat Proyek</a>
                <a href="#kontak" class="btn btn-putih">Hubungi Saya</a>
            </div>
        </div>
    </div>

    <a href="#tentang" class="turun" aria-label="Gulir ke bagian Tentang">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
    </a>
</section>

<section class="section tentang-bg" id="tentang">
    <div class="tentang-hias" aria-hidden="true"><span></span><span></span></div>

    <div class="container">
        <h2 class="judul">Tentang Saya</h2>

        <div class="grid tentang-grid">
            <aside class="kartu tentang-profil">
                <div class="profil-atas">
                    <div class="profil-foto">
                        @if ($foto)
                            <img src="{{ $foto }}" alt="Foto {{ $profil['nama'] }}" loading="lazy" decoding="async" onerror="this.style.display='none'">
                        @endif
                        <span class="inisial" aria-hidden="true">JR</span>
                    </div>
                    <div>
                        <h3>{{ $profil['nama'] }}</h3>
                        <p>Mahasiswa {{ $profil['prodi'] }}</p>
                        <span class="status"><i></i> Terbuka untuk proyek freelance</span>
                    </div>
                </div>

                <ul class="profil-info">
                    <li>
                        <span class="pi-ikon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 2 9 2 12 0v-5"/></svg>
                        </span>
                        <div>
                            <small>Universitas</small>
                            <strong>{{ $profil['kampus'] }}</strong>
                        </div>
                    </li>
                    <li>
                        <span class="pi-ikon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        </span>
                        <div>
                            <small>Program Studi</small>
                            <strong>{{ $profil['prodi'] }}</strong>
                        </div>
                    </li>
                </ul>

                <div class="profil-stat">
                    <div><b>{{ count($proyek) }}</b><span>Proyek</span></div>
                    <div><b>{{ count($ahli['item']) }}</b><span>Bidang Keahlian</span></div>
                </div>

                <a href="#kontak" class="btn btn-utama btn-kecil">Hubungi Saya</a>
            </aside>

            <div class="tentang-teks">
                <p class="lead">Saya {{ $profil['nama'] }}, mahasiswa program studi {{ $profil['prodi'] }} di {{ $profil['kampus'] }}.</p>
                <p></p>

                <blockquote class="fokus-kutip">{{ $ahli['intro'] }}</blockquote>

                <h3 class="fokus-judul">Bidang yang saya tekuni</h3>
                <ul class="fokus-daftar">
                    @foreach ($ahli['item'] as $item)
                        <li>
                            <span class="fokus-no">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            {{ $item['sub'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section section-abu" id="keahlian">
    <div class="container">
        <h2 class="judul">{{ $ahli['judul'] }}</h2>

        <div class="grid grid-2">
            @foreach ($ahli['item'] as $item)
                <article class="kartu kartu-skill">
                    <div class="ikon">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                    <h3>{{ $item['judul'] }}</h3>
                    <p class="sub">{{ $item['sub'] }}</p>
                    @if (!empty($item['tag']))
                        <p class="tek-label">{{ $item['label'] }}</p>
                        <div class="chips">
                            @foreach ($item['tag'] as $tag)
                                <span class="chip">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif
                    <p class="isi">{{ $item['isi'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-grad" id="proyek">
    <div class="container">
        <h2 class="judul">Proyek</h2>
        <div class="grid grid-2">
            @foreach ($proyek as $p)
                <article class="kartu proyek">
                    <div class="thumb">
                        @if ($p['gambar_url'])
                            <img src="{{ $p['gambar_url'] }}" alt="Tampilan aplikasi {{ $p['nama'] }}" loading="lazy" decoding="async">
                        @endif
                        <span class="inisial" aria-hidden="true">{{ $p['inisial'] }}</span>
                        @if ($p['jumlah_foto'] > 1)
                            <span class="badge-foto">{{ $p['jumlah_foto'] }} foto</span>
                        @endif
                    </div>
                    <div class="proyek-isi">
                        <span class="label">{{ $p['kategori'] }}</span>
                        <h3>{{ $p['nama'] }}</h3>
                        <p>{{ $p['ringkas'] }}</p>
                        <a href="{{ route('proyek.show', $p['slug']) }}" class="btn btn-garis btn-kecil">Lihat Detail</a>
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
@endsection
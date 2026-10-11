@extends('layouts.app')

@section('konten')
@php
    $profil = config('portofolio.profil');
    $keahlian = config('portofolio.keahlian');
@endphp

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
                    <div class="thumb">
                        @if ($p['gambar_url'])
                            <img src="{{ $p['gambar_url'] }}" alt="Tampilan aplikasi {{ $p['nama'] }}" loading="lazy" decoding="async">
                        @endif
                        <span aria-hidden="true">{{ $p['inisial'] }}</span>
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
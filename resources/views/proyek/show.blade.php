@extends('layouts.app')

@section('judul', $p['nama'] . ' | ' . config('portofolio.profil.nama'))
@section('deskripsi', $p['ringkas'])

@section('konten')
@php
    $jumlah = count($p['slides']);
@endphp

<section class="detail">
    <div class="container">
        <a class="kembali" href="{{ route('home') }}#proyek">&larr; Kembali ke daftar proyek</a>

        <header class="detail-kepala">
            <p class="detail-kategori">{{ $p['kategori'] }}</p>
            <h1>{{ $p['nama'] }}</h1>
            <p class="detail-ringkas">{{ $p['ringkas'] }}</p>
        </header>

        @if ($jumlah > 0)
            <div class="slider detail-blok" data-slider>
                <div class="slider-area">
                    <div class="slider-jalur" tabindex="0" role="region" aria-label="Galeri tampilan {{ $p['nama'] }}">
                        @foreach ($p['slides'] as $s)
                            <figure class="slide">
                                <img src="{{ $s['url'] }}" alt="{{ $s['judul'] }} - {{ $p['nama'] }}" @if (! $loop->first) loading="lazy" @endif decoding="async">
                                <figcaption>{{ $s['judul'] }}</figcaption>
                            </figure>
                        @endforeach
                    </div>

                    @if ($jumlah > 1)
                        <button type="button" class="slider-tombol slider-prev" aria-label="Foto sebelumnya">&#8249;</button>
                        <button type="button" class="slider-tombol slider-next" aria-label="Foto berikutnya">&#8250;</button>
                    @endif
                </div>

                @if ($jumlah > 1)
                    <div class="slider-bawah">
                        <div class="slider-titik"></div>
                        <span class="slider-info"><span data-saat>1</span> / {{ $jumlah }} &middot; geser untuk foto lainnya</span>
                    </div>
                @endif
            </div>
        @else
            <div class="thumb thumb-besar detail-blok">
                <span class="inisial" aria-hidden="true">{{ $p['inisial'] }}</span>
            </div>
        @endif

        <div class="detail-grid">
            @if (!empty($p['latar']))
                <article class="kartu detail-blok">
                    <h2>Latar Belakang</h2>
                    <p>{{ $p['latar'] }}</p>
                </article>
            @endif

            @if (!empty($p['tujuan']))
                <article class="kartu detail-blok">
                    <h2>Tujuan Proyek</h2>
                    <ul class="daftar">
                        @foreach ($p['tujuan'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </article>
            @endif

            @if (!empty($p['masalah']))
                <article class="kartu detail-blok">
                    <h2>Permasalahan yang Diselesaikan</h2>
                    <p>{{ $p['masalah'] }}</p>
                </article>
            @endif

            @if (!empty($p['fitur']))
                <article class="kartu detail-blok">
                    <h2>Fitur Utama</h2>
                    <ul class="daftar">
                        @foreach ($p['fitur'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </article>
            @endif

            @if (!empty($p['teknologi']))
                <article class="kartu detail-blok">
                    <h2>Teknologi yang Digunakan</h2>
                    <div class="chips">
                        @foreach ($p['teknologi'] as $tek)
                            <span class="chip">{{ $tek }}</span>
                        @endforeach
                    </div>
                </article>
            @endif

            @if (!empty($p['peran']))
                <article class="kartu detail-blok">
                    <h2>Peran dan Proses Pengerjaan</h2>
                    <p>{{ $p['peran'] }}</p>
                </article>
            @endif

            @if (!empty($p['hasil']))
                <article class="kartu detail-blok">
                    <h2>Hasil Proyek</h2>
                    <p>{{ $p['hasil'] }}</p>
                </article>
            @endif
        </div>

        <div class="detail-aksi detail-blok">
            <a href="{{ route('home') }}#proyek" class="btn btn-garis">Kembali ke Proyek</a>
            @if (!empty($p['demo']))
                <a href="{{ $p['demo'] }}" class="btn btn-garis" target="_blank" rel="noopener">Lihat Demo</a>
            @endif
            <a href="{{ route('home') }}#kontak" class="btn btn-utama">Hubungi Saya</a>
        </div>
    </div>
</section>
@endsection
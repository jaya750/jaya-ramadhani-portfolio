@extends('layouts.app')

@section('judul', $p['nama'] . ' | ' . config('portofolio.profil.nama'))
@section('deskripsi', $p['ringkas'])

@section('konten')
@php
    $profil = config('portofolio.profil');
    $kosong = 'Informasi ini sedang dilengkapi dan akan diperbarui.';
@endphp

<section class="detail">
    <div class="container">
        <a class="kembali" href="{{ route('home') }}#proyek">&larr; Kembali ke daftar proyek</a>

        <header class="detail-kepala">
            <p class="detail-kategori">{{ $p['kategori'] }}</p>
            <h1>{{ $p['nama'] }}</h1>
            <p class="detail-ringkas">{{ $p['ringkas'] }}</p>
        </header>

        <div class="thumb thumb-besar detail-blok">
            @if ($p['gambar_url'])
                <img src="{{ $p['gambar_url'] }}" alt="Tampilan aplikasi {{ $p['nama'] }}" decoding="async">
            @endif
            <span aria-hidden="true">{{ $p['inisial'] }}</span>
        </div>

        <div class="detail-grid">
            <article class="kartu detail-blok lebar">
                <h2>Latar Belakang dan Tujuan</h2>
                <p>{{ $p['latar_tujuan'] ?? $kosong }}</p>
            </article>

            <article class="kartu detail-blok">
                <h2>Permasalahan yang Diselesaikan</h2>
                <p>{{ $p['masalah'] ?? $kosong }}</p>
            </article>

            <article class="kartu detail-blok">
                <h2>Fitur Utama</h2>
                @if (!empty($p['fitur']))
                    <ul class="daftar">
                        @foreach ($p['fitur'] as $fitur)
                            <li>{{ $fitur }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>{{ $kosong }}</p>
                @endif
            </article>

            <article class="kartu detail-blok">
                <h2>Teknologi yang Digunakan</h2>
                @if (!empty($p['teknologi']))
                    <div class="chips">
                        @foreach ($p['teknologi'] as $tek)
                            <span class="chip">{{ $tek }}</span>
                        @endforeach
                    </div>
                @else
                    <p>{{ $kosong }}</p>
                @endif
            </article>

            <article class="kartu detail-blok">
                <h2>Peran dan Proses Pengerjaan</h2>
                <p>{{ $p['peran'] ?? $kosong }}</p>
            </article>

            <article class="kartu detail-blok lebar">
                <h2>Hasil Proyek</h2>
                <p>{{ $p['hasil'] ?? $kosong }}</p>
            </article>

            <article class="kartu detail-blok lebar">
                <h2>Screenshot Aplikasi</h2>
                @if (!empty($p['galeri_url']))
                    <div class="galeri">
                        @foreach ($p['galeri_url'] as $url)
                            <img src="{{ $url }}" alt="Screenshot {{ $p['nama'] }}" loading="lazy" decoding="async">
                        @endforeach
                    </div>
                @else
                    <p>Screenshot tambahan akan segera ditambahkan.</p>
                @endif
            </article>
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
<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PortofolioController extends Controller
{
    public function home(): View
    {
        $proyek = collect(config('portofolio.proyek'))
            ->map(function ($p) {
                $slides = $this->slides($p);

                return $p + [
                    'gambar_url'  => $slides[0]['url'] ?? null,
                    'jumlah_foto' => count($slides),
                ];
            })
            ->all();

        return view('home', [
            'proyek' => $proyek,
            'foto'   => $this->gambarUrl(config('portofolio.profil.foto')),
        ]);
    }

    public function proyek(string $slug): View
    {
        $p = collect(config('portofolio.proyek'))->firstWhere('slug', $slug);

        abort_if($p === null, 404);

        $p['slides'] = $this->slides($p);

        return view('proyek.show', ['p' => $p]);
    }

    /**
     * Susun slide sesuai urutan di config. Foto yang tidak ditemukan dilewati.
     */
    private function slides(array $p): array
    {
        $hasil = [];

        foreach ($p['galeri'] ?? [] as $g) {
            $url = $this->gambarUrl($g[0] ?? null);

            if ($url) {
                $hasil[] = [
                    'url'   => $url,
                    'judul' => $g[1] ?? ('Tampilan ' . $p['nama']),
                ];
            }
        }

        return $hasil;
    }

    /**
     * Daftar gambar di public/images (ekstensi bebas, huruf besar-kecil tidak berpengaruh).
     */
    private function daftarGambar(): array
    {
        static $daftar = null;

        if ($daftar !== null) {
            return $daftar;
        }

        $daftar = [];
        $dir = public_path('images');

        if (! is_dir($dir)) {
            return $daftar;
        }

        foreach (scandir($dir) as $file) {
            $info = pathinfo($file);
            $ext = strtolower($info['extension'] ?? '');

            if (! in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'avif', 'svg'], true)) {
                continue;
            }

            $daftar[] = [
                'nama' => strtolower($info['filename']),
                'url'  => asset('images/' . rawurlencode($file)),
            ];
        }

        return $daftar;
    }

    private function gambarUrl(?string $nama): ?string
    {
        if (! $nama) {
            return null;
        }

        $nama = strtolower($nama);

        foreach ($this->daftarGambar() as $g) {
            if ($g['nama'] === $nama) {
                return $g['url'];
            }
        }

        return null;
    }
}
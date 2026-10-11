<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PortofolioController extends Controller
{
    public function home(): View
    {
        $proyek = collect(config('portofolio.proyek'))
            ->map(fn ($p) => $p + [
                'gambar_url'  => $this->gambarUrl($p['gambar'] ?? null),
                'jumlah_foto' => count($this->galeriUrl($p['galeri_pola'] ?? null)),
            ])
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

        $urls = $this->galeriUrl($p['galeri_pola'] ?? null);

        if (empty($urls)) {
            $sampul = $this->gambarUrl($p['gambar'] ?? null);
            $urls = $sampul ? [$sampul] : [];
        }

        $p['slides'] = [];
        foreach ($urls as $i => $url) {
            $p['slides'][] = [
                'url'   => $url,
                'judul' => $p['galeri_judul'][$i] ?? ('Tampilan ' . $p['nama']),
            ];
        }

        return view('proyek.show', ['p' => $p]);
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

    /**
     * Ambil semua gambar yang cocok dengan pola, urut menurut angka di akhir nama.
     */
    private function galeriUrl(?string $pola): array
    {
        if (! $pola) {
            return [];
        }

        $pola = strtolower($pola);
        $cocok = array_filter($this->daftarGambar(), fn ($g) => fnmatch($pola, $g['nama']));

        usort($cocok, fn ($a, $b) => $this->nomor($a['nama']) <=> $this->nomor($b['nama']));

        return array_column($cocok, 'url');
    }

    private function nomor(string $nama): int
    {
        return preg_match('/(\d+)$/', $nama, $m) ? (int) $m[1] : 0;
    }
}
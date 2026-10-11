<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PortofolioController extends Controller
{
    public function home(): View
    {
        $proyek = collect(config('portofolio.proyek'))
            ->map(fn ($p) => $p + ['gambar_url' => $this->gambarUrl($p['gambar'])])
            ->all();

        return view('home', ['proyek' => $proyek]);
    }

    public function proyek(string $slug): View
    {
        $p = collect(config('portofolio.proyek'))->firstWhere('slug', $slug);

        abort_if($p === null, 404);

        $p['gambar_url'] = $this->gambarUrl($p['gambar']);
        $p['galeri_url'] = array_values(array_filter(
            array_map(fn ($nama) => $this->gambarUrl($nama), $p['galeri'])
        ));

        return view('proyek.show', ['p' => $p]);
    }

    /**
     * Cari file public/images/{nama}.* tanpa mengasumsikan ekstensi.
     */
    private function gambarUrl(string $nama): ?string
    {
        $file = glob(public_path('images/' . $nama . '.*'));

        return $file ? asset('images/' . basename($file[0])) : null;
    }
}
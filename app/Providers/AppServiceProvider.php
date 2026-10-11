<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Di balik proxy HTTPS (mis. Render), pakai https untuk URL aset.
        if (request()->header('X-Forwarded-Proto') === 'https') {
            URL::forceScheme('https');
        }
    }
}
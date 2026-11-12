<?php

namespace App\Providers;

use App\Business\Services\HiService;
use Illuminate\Support\ServiceProvider;
use MessageServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //}

        $this->app->bind(MessageServiceInterface::class, HiService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

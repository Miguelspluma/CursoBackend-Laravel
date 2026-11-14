<?php

namespace App\Providers;

use App\Business\Interfaces\MessageServiceInterface as InterfacesMessageServiceInterface;
use App\Business\Services\HiService;
use App\Business\Services\HiUserService;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //}

        $this->app->bind(InterfacesMessageServiceInterface::class, HiUserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

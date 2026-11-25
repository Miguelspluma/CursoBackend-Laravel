<?php

namespace App\Providers;

use App\Business\ExternalService\ApiService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ApiService::class, function($app){
            //esto es mejor que poner env("API_URL") ya que se cachea en config y es más rapido a diferencia de usar el env
            $url= config("services.api.url");
            return new ApiService($url);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Route::get('/api/posts', function(ApiService $apiService){
            return response()->json($apiService->getData());
        });
    }
}

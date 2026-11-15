<?php

namespace App\Providers;

use App\Business\Interfaces\MessageServiceInterface;
use App\Business\Services\EncryptorService;
use App\Business\Services\HiService;
use App\Business\Services\HiUserService;
use App\Business\Services\SingletonService;
use App\Http\Controllers\InfoController;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //}

        $this->app->bind(MessageServiceInterface::class, HiUserService::class);
        $this->app->bind(EncryptorService::class, function(){
            return New EncryptorService(env("KEY_ENCRYPT"));
        });
        //context binding,
        $this->app->when(InfoController::class) //cuando el controlador...
        ->needs(MessageServiceInterface::class) //necesite la interface...
        ->give(HiService::class); //dale la clase....
        //crea el mismo objeto, util para objetos muy pesados o que tardan mucho en crearse
        $this->app->singleton(SingletonService::class, function($app){
           return new SingletonService(); 
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;


class LogUserRegistered implements ShouldQueue
{

    //manejo de errores en el listener
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */

    public $tries=3; //ejecuta el handle 3 veces 
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        //manejando el evento
        //Log::info("Nuevo Usuario Registrado", ["id"=>$event->user->id]);
        $this->release(3); //segundos entre reintentos
        throw new Exception("Error Error al actualizar el usuario, intento: {$this->attempts()}");
    }


    //solo se ejecuta 1 sola vez, una vez que se vencieron los 3 reintentos, o intento unico
    public function failed(UserRegistered $event, $exception)
    {
        Log::critical("El registro del log de usuario {$event->user["id"]}");
    }
}

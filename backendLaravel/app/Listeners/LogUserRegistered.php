<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogUserRegistered
{

//manejo de errores en el listener
use InteractsWithQueue;
    /**
     * Create the event listener.
     */
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
      throw new Exception("Error Error al actualizar el usuario");
       
    }

    public function failed(UserRegistered $event, $exception){
        Log::critical("El registro del log de usuario $event->user['id']");
    }

}

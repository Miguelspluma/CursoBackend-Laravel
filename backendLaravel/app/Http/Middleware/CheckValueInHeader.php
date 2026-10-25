<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckValueInHeader
{
    /** 
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     * Handle es un metodo que intercepta la solicitud
     */
    public function handle(Request $request, Closure $next): Response
    {

        // if ($request->header("token") !== '123456') {
        //     return response()->json(["message" => "Error, token no valido", 403]);
        // }
        // //continua su ejecucion hacia el controlador
        return $next($request);
    }
}

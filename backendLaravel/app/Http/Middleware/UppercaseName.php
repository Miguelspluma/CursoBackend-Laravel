<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UppercaseName
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //comprueba si un dato esta presente en la solicitud
        // if($request->has("name")){
        //     //merge agrega datos nuevos o modifica los ya existentes.
        //     $request->merge([
        //         "name"=>strtoupper($request->input("name"))
        //     ]);
        // }
        return $next($request);
    }
}

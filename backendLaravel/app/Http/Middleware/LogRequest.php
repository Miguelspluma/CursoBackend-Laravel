<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data=[
            "url"=>$request->fullUrl(),
            "Ip"=>$request->ip(),
            "Method"=>$request->method(),
            "headers"=>$request->headers->all(),
            "body"=>$request->getContent()
        ];

        Log::info('Genial',$data);
        return $next($request);
    }

    public function terminate(Request $req, Response $res ){
    Log::info("Respuesta enviada", [
        "status"=>$res->getStatusCode(), //obtiene el statuscode
        'Contect'=>$res->getContent() //obtiene la respuesta del content
    ]);

    }
}

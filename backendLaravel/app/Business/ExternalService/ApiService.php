<?php

namespace App\Business\ExternalService;

use Illuminate\Support\Facades\Http;

class ApiService
{


    public function __construct(protected string $url) {}
    //obtiene algun servicio por medio de url
    public function getData()
    {
        $response = Http::WithoutVerifying()->get($this->url); //por si no tiene certificado ssl 

        if ($response->successful()) {
            return $response->json();
        }

        return ["message"=>"Ocurrio un error"];
    }
}

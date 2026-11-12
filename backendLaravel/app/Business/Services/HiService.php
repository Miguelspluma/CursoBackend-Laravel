<?php

namespace App\Business\Services;

use MessageServiceInterface;

class HiService implements MessageServiceInterface{
    public function hi(){
        return 'Hola Mundo desde service container';
    }
}

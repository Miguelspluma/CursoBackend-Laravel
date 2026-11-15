<?php

declare(strict_types=1);
namespace App\Business\Services;
use Illuminate\Support\Facades\Crypt;

class EncryptorService
{
    private string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function encrypt(string $data): string
    {
        return base64_encode($this->key . ":" . Crypt::encryptString($data));
    }

    public function decrypt(string $data): string
    {
        $decodeData = base64_decode($data);

        //destructuring, siempre el key sera LARAVELRULES
        [$key, $encrypted] = explode(":", $decodeData, 2);
        
        
        if ($key !== $this->key) {
            throw new \Exception('Clave incorrecta');
        }

        return crypt::decryptString($encrypted);
    }
}

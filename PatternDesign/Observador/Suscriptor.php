<?php
namespace Observador;
use Interfaces\ObservadorInterface;

class Suscriptor implements ObservadorInterface
{
    private $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function actualizar($mensaje)
    {
        echo $this->nombre . " recibió: " . $mensaje . "<br>";
    }
}
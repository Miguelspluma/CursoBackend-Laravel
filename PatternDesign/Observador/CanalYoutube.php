<?php 
namespace Observador;
use Interfaces\ObservadorInterface;

class CanalYouTube
{
    private $suscriptores = [];

    public function agregarSuscriptor(ObservadorInterface $suscriptor)
    {
        $this->suscriptores[] = $suscriptor;
    }

    public function eliminarSuscriptor(ObservadorInterface $suscriptor)
    {
        foreach ($this->suscriptores as $key => $s) {
            if ($s === $suscriptor) {
                unset($this->suscriptores[$key]);
            }
        }
    }

    public function publicarVideo($titulo)
    {
        echo "Nuevo video publicado: $titulo<br>";

        foreach ($this->suscriptores as $suscriptor) {
            $suscriptor->actualizar(
                "Se publicó un nuevo video: $titulo"
            );
        }
    }
}
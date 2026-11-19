<?php 

require('autoload.php');

use Interfaces\ObservadorInterface;
use Observador\CanalYouTube;
use Observador\Suscriptor;

 // Creamos el canal
$canal = new CanalYouTube();

// Creamos los suscriptores
$juan = new Suscriptor("Juan");
$maria = new Suscriptor("María");
$pedro = new Suscriptor("Pedro");

// Registramos los suscriptores
$canal->agregarSuscriptor($juan);
$canal->agregarSuscriptor($maria);
$canal->agregarSuscriptor($pedro);

// Publicamos un video
$canal->publicarVideo("Aprendiendo PHP");




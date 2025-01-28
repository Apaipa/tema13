<?php

$dni = filter_input(INPUT_GET, 'dni', FILTER_SANITIZE_STRING);
$nombre = htmlspecialchars(trim($_GET['nombre']),ENT_QUOTES,'UTF-8');
$apellido = htmlspecialchars(trim($_GET['apellido']),ENT_QUOTES,'UTF-8');

$comprobarDni = "/^[0-9]{8}[A-Z]$/";
$comprobarNombre = "/^[A-Za-z]+$/";
$noComprobar=0;

if (preg_match($comprobarDni, $dni) && 
    preg_match($noComprobar, $nombre) && 
    preg_match($comprobarNombre, $apellido)) {
    echo "Todos los datos son válidos.";
} else {
    echo "Hay errores en los datos enviados. Verifica e inténtalo nuevamente.";
}
?>

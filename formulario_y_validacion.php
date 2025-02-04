<?php

$nombre = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_STRING);
$apellido = filter_input(INPUT_GET, 'apellido', FILTER_SANITIZE_STRING);
$correo = filter_input(INPUT_GET, 'correo', FILTER_VALIDATE_EMAIL);
$dni = filter_input(INPUT_GET, 'dni', FILTER_SANITIZE_STRING);
$telefono = filter_input(INPUT_GET, 'telefono', FILTER_SANITIZE_STRING);
$direccion = filter_input(INPUT_GET, 'direccion', FILTER_SANITIZE_STRING);
$codigo_postal = filter_input(INPUT_GET, 'codigo_postal', FILTER_SANITIZE_STRING);
$puesto_trabajo = filter_input(INPUT_GET, 'puesto_trabajo', FILTER_SANITIZE_STRING);
$salario = filter_input(INPUT_GET, 'salario', FILTER_VALIDATE_FLOAT);

$comprobarDni = "/^[0-9]{8}[A-Z]$/";
$comprobarTexto = "/^[A-Za-z]+$/";


$errores = [];

if (!$nombre || !preg_match($comprobarTexto, $nombre)) {
    $errores[] = "Nombre inválido. Solo se permiten letras.";
}

if (!$apellido || !preg_match($comprobarTexto, $apellido)) {
    $errores[] = "Apellido inválido. Solo se permiten letras.";
}

if (!$correo) {
    $errores[] = "Correo electrónico inválido.";
}

if (!$dni || !preg_match($comprobarDni, $dni)) {
    $errores[] = "DNI inválido. Debe tener 8 dígitos seguidos de una letra mayúscula.";
}

if (!$telefono || !is_numeric($telefono)) {
    $errores[] = "Teléfono inválido.";
}

if (!$direccion) {
    $errores[] = "Dirección inválida.";
}

if (!$codigo_postal || !is_numeric($codigo_postal)) {
    $errores[] = "Código postal inválido.";
}

if (!$puesto_trabajo) {
    $errores[] = "Puesto de trabajo inválido.";
}

if ($salario === false) {
    $errores[] = "Salario inválido.";
}


if (empty($errores)) {
    echo "Todos los datos son válidos.";

} else {
    foreach ($errores as $error) {
        echo "<p>Error: $error</p>";
    }
}
?>

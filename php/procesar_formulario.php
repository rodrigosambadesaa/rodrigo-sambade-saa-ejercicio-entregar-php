<?php
    declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesando Formulario</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<div class="container">
    <h1>Datos Ingresados</h1>
    <?php
        // Recopilando datos del formulario
        $nombre = isset($_REQUEST['nombre']) ? trim($_REQUEST['nombre']) : '';
        $apellido = isset($_REQUEST['apellido']) ? trim($_REQUEST['apellido']) : '';
        $edad = isset($_REQUEST['edad']) ? trim($_REQUEST['edad']) : '';
        $sexo = isset($_REQUEST['sexo']) ? trim($_REQUEST['sexo']) : '';
        $correo = isset($_REQUEST['correo']) ? trim($_REQUEST['correo']) : '';
        $telefono = isset($_REQUEST['telefono']) ? trim($_REQUEST['telefono']) : '';

        // Validando campos no vacíos
        if (!empty($nombre) && !empty($apellido) && !empty($edad) && !empty($sexo) && !empty($correo) && !empty($telefono)) {
            // Validando los datos ingresados
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
            $apellido = filter_var($apellido, FILTER_SANITIZE_STRING);
            $edad = filter_var($edad, FILTER_VALIDATE_INT);
            $sexo = filter_var($sexo, FILTER_SANITIZE_STRING);
            $correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
            $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);

            // Validar que el nombre y apellido sean cadenas de texto válidas
            if ($nombre === false || $apellido === false) {
                echo "<p>Por favor, ingrese un nombre y apellido válidos.</p>";
                exit;
            }

            // Validar que la edad sea un número entero positivo
            if ($edad === false || $edad < 0) {
                echo "<p>Por favor, ingrese una edad válida.</p>";
                exit;
            }

            // Validar que el sexo sea un valor válido
            if ($sexo !== 'masculino' && $sexo !== 'femenino') {
                echo "<p>Por favor, seleccione un sexo válido.</p>";
                exit;
            }

            // Validar que el correo sea un correo electrónico válido
            if ($correo === false) {
                echo "<p>Por favor, ingrese un correo electrónico válido.</p>";
                exit;
            }

            // Validar que el teléfono sea un número de teléfono válido, teniendo en cuenta el formato internacional
            if ($telefono === false) {
                echo "<p>Por favor, ingrese un número de teléfono válido.</p>";
                exit;
            }

            // Mostrando los datos ingresados
            echo "<p><strong>Nombre:</strong> $nombre</p>";
            echo "<p><strong>Apellido:</strong> $apellido</p>";
            echo "<p><strong>Edad:</strong> $edad</p>";
            echo "<p><strong>Sexo:</strong> $sexo</p>";
            echo "<p><strong>Correo Electrónico:</strong> $correo</p>";
            echo "<p><strong>Teléfono:</strong> $telefono</p>";
        } else {
            echo "<p>Por favor, complete todos los campos del formulario.</p>";
        }
    ?>

    <a href="../www/index.html">Volver al formulario</a>
</div>
</body>
</html>

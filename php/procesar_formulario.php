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
    $nombre = $_REQUEST['nombre'] ?? '';
    $apellido = $_REQUEST['apellido'] ?? '';
    $edad = $_REQUEST['edad'] ?? '';
    $sexo = $_REQUEST['sexo'] ?? '';
    $correo = $_REQUEST['correo'] ?? '';
    $telefono = $_REQUEST['telefono'] ?? '';

    // Validando campos no vacíos
    if (!empty($nombre) && !empty($apellido) && !empty($edad) && !empty($sexo) && !empty($correo) && !empty($telefono)) {
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
</div>
</body>
</html>

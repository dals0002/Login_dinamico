<?php
// Inicia la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica si existe una sesión y, si es así, la destruye
if (isset($_SESSION['usuario'])) {
    session_unset();  // Borra las variables de sesión
    session_destroy(); // Destruye la sesión
}

// Muestra un mensaje de cierre de sesión
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilo1.css">
    <title>Cierre de Sesión</title>
</head>
<body>
    <div class="contenedor">
        <div class="bienvenida">
            <h1>Gracias por Visitarnos</h1>
        </div>
        <div class="usuario">
            <h2>Te deseamos un feliz dia</h2>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Login</a></li>
                <li><a href="https://venezolanosensajonia.de/">Salir</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>


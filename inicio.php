<?php session_start();  
if ((isset($_SESSION['iniciada']) && $_SESSION['iniciada'] == true))
{
  $SESION      = true;
  $USUARIO_ID      = $_SESSION['usu_id'];
  $USUARIO_NOMBRE  = $_SESSION['usu_nombre'];
  $USUARIO_CORREO = $_SESSION['usu_correo'];
  $USUARIO_USER = $_SESSION['usu_usuario'];
}else{
  echo '<script>window.location.href="index.php";</script>';
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilo1.css"> <!-- Agrega aquí tu enlace a la hoja de estilo personalizada -->
    <title>Bienvenido a la Página Principal</title>
</head>
<body>
    <div class="contenedor">
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo de tu sitio" width="300" height="auto">
        </div>
        <div class="contenedor" class="bienvenida">
            <h1>Bienvenidos a Venezolanos en Sajonia e.V.</h1>
            <p>Portal de Socios</p>
        </div><br>

        <div class="usuario">
            <h2>Usuario, <?php echo $USUARIO_NOMBRE; ?></h2>
        </div>

        <div class="cerrar-sesion">
            <a href="cerrar_sesion.php">
                <div class="icono-texto">
                    <img src="assets/images/exit.png" alt="Cerrar Sesión">
                    <span>Salir</span>
                </div>
            </a>
        </div>


        <nav>
            <ul>
                <li><a href="#">Opción 1</a></li>
                <li><a href="#">Opción 2</a></li>
                <!-- Agrega más opciones según sea necesario -->
            </ul>
        </nav>
    </div>

<script src="assets/js/script_index.php.js"></script>

</body>
</html>
?>

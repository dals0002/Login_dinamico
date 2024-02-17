<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilo_registro.css"> <!-- Agrega tus estilos CSS aquí -->
    <title>Registro de Usuario</title>

    <script src="assets/js/sweetalert2.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert2.css" />
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Conectarse a la base de datos (requiere conexion.php)
    require('conexion.php');

    if(!empty($nombre) AND !empty($correo) AND !empty($usuario) AND !empty($contrasena))
    {

        // Verificar si el usuario ya existe
        $verificarUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' OR correo = '$correo'";
        $resultado = mysqli_query($conn, $verificarUsuario);

        if (mysqli_num_rows($resultado) > 0) {
            echo '<script>  
                Swal.fire({
                    title: "El nombre de usuario o correo ya está registrado. Por favor, elige otro.",
                    icon: "error",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 4000,
                    timerProgressBar: true,
                });
            </script>';
        } else {
            // El usuario no existe, procede con el registro
            $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);
            $query = "INSERT INTO usuarios (nombre, correo, usuario, contrasena) VALUES ('$nombre', '$correo', '$usuario', '$hashedPassword')";

            if (mysqli_query($conn, $query)) {
                echo '<script>  
                    Swal.fire({
                        title: "¡Su Registro fue Éxito!",
                        icon: "success",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    $("#registro_form").trigger("reset");
                    $("#btn__iniciar-sesion").click();
                </script>';
            } else {
                echo '<script>  
                    Swal.fire({
                        title: "Error al registrar el usuario. Por favor, inténtalo de nuevo.",
                        icon: "error",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 4000,
                        timerProgressBar: true,
                    });
                </script>';
            }
        }
    }else{
        echo '<script>  
            Swal.fire({
                title: "Completa todos los campos!",
                icon: "warning",
                showConfirmButton: false,
                allowOutsideClick: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>';
    }
}
?>
</body>
</html>
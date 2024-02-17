<!DOCTYPE html>
<html lang="en">
<head>
    <script src="assets/js/sweetalert2.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert2.css" />
</head>
<body>
<?php
session_start(); // Asegúrate de iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["contrasena"];

    // Conectar a la base de datos (requiere conexion.php)
    require('conexion.php');

    if(!empty($usuario) AND !empty($clave))
    {

        $usuario = mysqli_real_escape_string($conn, $usuario);
        $clave = mysqli_real_escape_string($conn, $clave);

        $ChkUsuario = "SELECT id, nombre, correo, usuario, contrasena FROM usuarios WHERE usuario='$usuario'";
        $ChkUsuario_result =mysqli_query($conn, $ChkUsuario);           

        if (mysqli_num_rows($ChkUsuario_result) == 1)
        {
            $UsuarioRow = mysqli_fetch_assoc($ChkUsuario_result);
            $clavehash=$UsuarioRow['contrasena'];


            if (password_verify($clave, $clavehash))
            {
                $_SESSION['iniciada'] = true;
                $_SESSION['usu_id'] = $UsuarioRow['id'];
                $_SESSION['usu_nombre'] = $UsuarioRow['nombre'];
                $_SESSION['usu_correo'] = $UsuarioRow['correo'];
                $_SESSION['usu_usuario'] = $UsuarioRow['usuario'];

                echo '<script>window.location.href="inicio.php";</script>';
                session_write_close();
            }else{ 
        
                echo'
                <script>  
                    Swal.fire({
                        title: "Usuario o Contraseña incorrecta!",
                        text: "Intenta de Nuevo....",
                        icon: "error",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                       timer: 2000,
                       timerProgressBar: true
                    });
                    function redireccionar(){
                            window.location = "index.php";
                    }
                    setTimeout ("redireccionar()", 2000);
                </script>';       
            }
        }else{ 
            echo'
            <script>  
                Swal.fire({
                    title: "Usuario o Contraseña incorrecta!",
                    text: "Intenta de Nuevo....",
                    icon: "error",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                   timer: 2000,
                   timerProgressBar: true
                });
                function redireccionar(){
                        window.location = "index.php";
                }
                setTimeout ("redireccionar()", 2000);
            </script>';       
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
            function redireccionar(){
                    window.location = "index.php";
            }
            setTimeout ("redireccionar()", 3000);
        </script>';
    }
}

// Establecer el tiempo máximo de inactividad en segundos (ejemplo: 15 minutos)
$inactivityTimeout = 900; // 15 minutos

// Comprobar si existe la variable de usuario en la sesión
if (isset($_SESSION['iniciada']) && isset($_SESSION['last_activity'])) {
    // Comprobar si ha pasado más tiempo del límite de inactividad
    if (time() - $_SESSION['last_activity'] > $inactivityTimeout) {
        session_unset();  // Borra las variables de sesión
        session_destroy(); // Destruye la sesión
        header("Location: index.php"); // Redirige al inicio de sesión
        exit();
    }
}

// Actualizar el tiempo de última actividad
$_SESSION['last_activity'] = time();
?>

</body>
</html>

<?php
// Configuración de la base de datos
$hostname = "rdbms.strato.de";        // Cambia esto según tu servidor de base de datos
$username = "dbu3175934";             // Cambia esto según tu Usuario Servidor Local ó Hosting
$password = "Panama.22*";               // Cambia esto según tu Password Servidor Local ó Hosting
$database = "dbs12184884";  // Mi base de datos en hosting tiene prefijo (itsuppo1_)

// Establecer la conexión
$conn = mysqli_connect($hostname, $username, $password, $database);

// Función para registrar usuarios
function registerUser($nombre, $correo, $usuario, $contrasena) {
    global $conn;
    $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);
    $query = "INSERT INTO usuarios (nombre, correo, usuario, contrasena) VALUES ('$nombre', '$correo', '$usuario', '$hashedPassword')";
    return mysqli_query($conn, $query);
}

// Función para verificar las credenciales de inicio de sesión
function loginUser($usuario, $contrasena) {
    global $conn;
    $query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($contrasena, $row['contrasena'])) {
            return true;
        }
    }
    return false;
}
?>



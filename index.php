<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">3
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VES</title>

    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>

        <main>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form id="registro_form" class="formulario__register">
                        <h2>Registro</h2>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre completo">
                        <input type="text" id="correo" name="correo" placeholder="Correo Electrónico">
                        <input type="text" id="usuario" name="usuario" placeholder="Usuario">
                        <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña">
                        <button class="registro_nuevo">Registrarse</button>
                    </form>

                    <!--Register-->
                    <form id="" action="inicio_sesion.php" class="formulario__login" method="post" onsubmit="return validateLoginForm()">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" id="loginUsuario" name="usuario" placeholder="Usuario">
                        <input type="password" id="loginContrasena" name="contrasena" placeholder="Contraseña">
                        <button type="submit">Iniciar Sesión</button>
                    </form>
                </div>
                <div id="mensaje"></div>
            </div>
        </main>

        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/script.js"></script>

        <script>
            $(document).ready(function () {
                $(".registro_nuevo").click(function (event) {
                    event.preventDefault();
                    var form = $('#registro_form')[0];
                    var data = new FormData(form);
                    
                    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: "registro.php",
                        data: data,
                        backdrop: false,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 800000,
                        success: function (data) {
                          $('#mensaje').fadeIn(1000).html(data);                                                
                        },
                        error: function (e) { 
                            $('#mensaje').fadeIn(1000).html(data);
                        }
                    });          
                });          
            });
        </script>            

        </script>


</body>
</html>
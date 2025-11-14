<?php
// Asegúrate de iniciar la sesión si no lo has hecho
// session_start(); 

// 1. Verificar si existe el parámetro 'login_error' en la URL
if (isset($_GET['login_error'])) {
    // 2. Decodificar el mensaje para mostrarlo correctamente
    $error_message = htmlspecialchars(urldecode($_GET['login_error']));

    // 3. Imprimir el mensaje de error usando un div que se pueda estilizar con CSS
    echo '<div style="color: red; background-color: #ffdddd; border: 1px solid red; padding: 10px; margin: 10px auto; text-align: center; max-width: 350px; border-radius: 5px;">';
    echo $error_message;
    echo '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style2.css">

</head>

<body>
    <video autoplay muted loop id="videoFondo">
        <source src="img/vid fon.mp4" type="video/mp4">
    </video>

    <section id="login-panel">

        <div class="formulario">
            <div id="overlayBlur">
                <h1 class="Titulo-incio">Inicio de sesion</h1>

                <form action="login_process.php" method="POST">
                    <button type="button" class="btn-volver" onclick="window.location.href='index.php'">Volver</button>
                    <button type="button" class="Boton-Cancelar" id="btn-registrar">Registrar</button>

                    <input type="text" placeholder="Nombre o correo" name="usuario" required><br>

                    <input type="password" placeholder="Contraseña" name="contrasena" required>

                    <br>
                    <button type="submit" class="boton-enviar">Iniciar sesion</button>
                </form>
            </div>
        </div>

    </section>

    <section id="register-panel" class="hidden">
        <div id="overlayBlur">
            <div class="Tiulo-Registro">
                <h1>Registro</h1>
            </div>

            <div class="Inicio-Registro">

                <form action="phpLogin/insertarregistro.php" method="POST">

                    <button type="button" class="Boton-Cancelar" id="btn-login">Volver a Inicio</button>
                    <input type="text" placeholder="Nombre" name="Nombre" required><br>
                    <input type="text" placeholder="Apellido" name="Apellido" required><br>

                    <label for="fecha-nacimiento"
                        style="color: #ffffff; display: block; margin-bottom: 5px; font-size: 14px;">Fecha de
                        Nacimiento:</label>
                    <input type="date" id="fecha-nacimiento" name="fecha_nacimiento" required><br><br>

                    <select id="sexo" name="genero">
                        <option value="" disabled selected>-- Selecciona tu sexo --</option>
                        <option value="H">Hombre</option>
                        <option value="M">Mujer</option>
                        <option value="P">Prefiero no decirlo</option>
                    </select><br>

                    <input type="email" placeholder="Correo" name="Correo" required>
                    <br>
                    <input type="password" placeholder="Contraseña" name="Contraseña" required>
                    <br>
                    <button type="submit" class="boton-enviar">Enviar</button>

                </form>
            </div>
        </div>
    </section>

    <script src="JavaScript/script2.js"></script>
</body>

</html>
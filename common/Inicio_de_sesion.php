<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Poppins&family=Roboto+Mono&family=Tourney&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style_session.css">
    <link rel="icon" href="../img/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In1c14 s3s10n</title>
</head>


<body>
    <div class="contenedorflex">
        <div class="container_session">
            <div class="group1">
                <div class="atras">
                    <img src="../img/atras.png" alt="">
                    <button type="button" class="toogle-btnatras"><a href="../index.php" class="atras">Volver a la
                            página de inicio</a></button>

                </div>
            </div>
            <div class="group2">
                <div class="btngroup">
                    <div id="elegir"></div>
                    <button type="button" class="toogle-btn" onclick="login()">Inicia sesión</button>
                    <button type="button" class="toogle-btn" onclick="registrar()">Regístrate</button>
                </div>
                <form id="login" class="input-group" method="post" action="validar.php" >
                    <div class="logo">
                        <img src="../img/iconNoBackground.png" alt="icono_hacks">
                    </div>
                    <input type="text" class="input-field" placeholder="Usuario" name="usuario" required>
                    <input type="password" class="input-field" placeholder="Contraseña" name="contrasena" required>
                    <input type="checkbox" class="check-box"><span>Recordar contraseña</span>
                    <input type="submit" value="Acceder" name="login"class="submit-btn">
                </form>
                
                <form id="registrar" class="input-group1" method="post" action="agregar.php">
                    <input type="text" class="input-field" placeholder="Nombre" name="inombre" required>
                    <input type="text" class="input-field" placeholder="Usuario" name="iusuario" required>
                    <input type="email" class="input-field" name="iemail" placeholder="Correo" required>
                    <input type="number" class="input-field" name="itel" placeholder="Teléfono" required>
                    <input type="text" class="input-field" name="icontrasena" placeholder="Contraseña" required>
                    <input type="checkbox" class="check-box"><span>Acepto los términos y condiciones</span>
                    <input type="submit" value="Registrarse" name="signup" class="submit-btn sbtn">
                </form>
            </div>
        </div>

    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("registrar");
        var z = document.getElementById("elegir");

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }

        function registrar() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "120px";
        }

    </script>
</body>

</html>
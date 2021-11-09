<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Contacto</title>
</head>

<body>
    <div class="contactoback">
        <form id="contacto" name="contacto" class="formulario-contacto" method="post" action="">
            <div class="campo">
                <label class="campo__label" for="nombre"> Nombre</label>
                <input class="campo__field" type="text" placeholder="Nombre" id="nombre" required>
            </div>
            <div class="campo">
                <label class="campo__label" for="email"> Email</label>
                <input class="campo__field" type="email" placeholder="Email" id="email" required>
            </div>
            <div class="campo">
                <label class="campo__label" for="tel"> Teléfono</label>
                <input class="campo__field" type="tel" placeholder="Telefono" id="tel" required>
            </div>
            <div class="campo">
                <label class="campo__label" for="mensaje"> Mensaje</label>
                <textarea class="campo__field campo__field--textarea" id="mensaje" placeholder=" ¿Tienes alguna pregunta? Cuéntanos!" required></textarea>
            </div>
            <div class="contacto-enviar-btn">
                <input type="submit" value="Enviar" name="contacto" class="btn-contacto">
            </div>

        </form>
    </div>
    </div>
</body>

</html>
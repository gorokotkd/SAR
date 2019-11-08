<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <script src="../js/validarFormulario.js"></script>
        <title>Libro de visitas</title>
    </head>
    <body style="text-align: center;background-color: beige">
        <h1>Añadir un comentario.</h1>
        <div>
            <form id="fcoment" action="verComentariosUsuario.php" method="POST">
                <div>
                    <label>Introduce tu nombre de usuario: * </label><br>
                    <input type="text" name="user" placeholder="Usuario">
                </div>
                <div>
                    <button type="submit" class="btn btn-danger">Enviar</button>
                </div>
                <div>
                    <a href="../html/index.html">Haz click aqui para volver a la pagina inicial.</a>
                </div>
            </form>
        </div>
    </body>
</html>
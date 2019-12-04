<?php include 'Seguridad.php' ?>
<html>
    <head>
        <?php include'../html/Head.html'?>
        <script src="../js/ShowImagesAjax.js"></script>
    </head>
    <body>
        <?php include'../php/Menus.php'?>
        <section id="s1" role="main" class="container">
                    <h3>Selecciona el tipo de imagenes que quieres ver:</h3>
                    <div class="form-group">
                        <select id="tipos" name="tipos" class="custom-select">
                            <option value="paisaje" selected>Paisajes</option>
                            <option value="ciudad">Ciudades</option>
                            <option value="deporte">Deportes</option>
                            <option value="animal">Animales</option>
                            <option value="comida">Comida</option>
                            <option value="otra">Otras</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" onclick="mostrarTabla()">Mostrar Imagenes</button>
                    </div>
                    <div id="tabla-images"></div>
        </section>
    </body>
</html>
<html>
    <head>
        <?php include'../html/Head.html'?>
        <script src="../js/ShowImagesAjax.js"></script>
    </head>
    <body>
        <?php include'../php/Menus.php'?>
        <section id="s1" class="main">
            <div class="tabla">
                <h3>Selecciona el tipo de imagenes que quieres ver:</h3>
                <select id="tipos" name="tipos">
                    <option value="paisaje" selected>Paisajes</option>
                    <option value="ciudad">Ciudades</option>
                    <option value="deporte">Deportes</option>
                    <option value="animal">Animales</option>
                    <option value="comida">Comida</option>
                    <option value="otra">Otras</option>
                </select>
                
                <input type="button" value="Mostrar Imagenes" onclick="mostrarTabla()">
                </div>
                <div id="tabla-images"></div>
        </section>
    </body>
</html>
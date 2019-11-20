<html>
    <head>
        <?php include '../html/Head.html';?>
        <script src="../js/ShowImageInForm.js"></script>
    </head>
    <body>
        <?php include'../php/Menus.php'?>
        <section id="s1" class="main">
            <div>
                <form id="f-add-image" method="get" enctype="multipart/form-data">
                    <div>
                        <label>Introduce tu correo electronico: *</label><br>
                        <input type="email" name="email" size="50" required pattern="((^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$)|^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$)">
                    </div>
                    <div>
                        <label>Selecciona la categoria de la imagen: *</label><br>
                        <input type="radio" value="paisaje" name="categoria">Paisajes
                        <input type="radio" value="ciudad" name="categoria">Ciudades<br>
                        <input type="radio" value="deporte" name="categoria">Deportes
                        <input type="radio" value="animal" name="categoria">Animales<br>
                        <input type="radio" value="comida" name="categoria">Comida
                        <input type="radio" value="otra" name="categoria" checked><b>Otras</b>
                    </div>
                    <div>
                        <label>Selecciona la imagen a subir: *</label><br>
                        <input type="file" id="file" accept="image/*" name="Imagen" onchange="verImagen(this)" required>
                    </div>
                    <div id="img-muestra"></div>
                    <div>
                        <input type="submit" value="Enviar Foto"><input type="reset" value="Limpiar Formulario">
                    </div>
                    
                </form>
        
            </div>
        </section>
        
        <?php
            if(isset($_REQUEST['email'])){
                phpinfo();
                $imagePath = "../images/";
                $imagename = $_FILES['Imagen']['name'];
                $imagetemp = $_FILES['Imagen']['tmp_name'];
                
                if(move_uploaded_file($imagetemp,$imagePath.$imagename)){
                    echo "Yupi";
                }
            }
        
        ?>
    </body>

</html>
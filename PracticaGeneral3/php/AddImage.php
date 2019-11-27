<?php include'seguridad.php' ?>
<html>
    <head>
        <?php include '../html/Head.html';?>
        <script src="../js/ShowImageInForm.js"></script>
    </head>
    <body>
        <?php include'../php/Menus.php'?>
        <section id="s1" class="main">
            <div>
                <form id="f-add-image" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Introduce tu correo electronico: *</label><br>
                        <input type="email" name="email" size="50" required value="<?php echo $_SESSION['email'] ?>" readonly pattern="((^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$)|^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$)">
                    </div>
                    <div>
                        <label>Selecciona la categoria de la imagen: *</label><br>
                        <select id="categoria" name="categoria">
                            <option value="paisaje">Paisajes</option><
                            option value="ciudad">Ciudades</option>
                            <option value="deporte">Deportes</option>
                            <option value="animal">Animales</option>
                            <option value="comida">Comida</option>
                            <option value="otra" selected>Otras</option>
                        </select>
                    </div>
                    <div>
                        <label>Selecciona la imagen a subir: *</label><br>
                        <input type="file" id="file" accept="image/*" name="file" onchange="verImagen(this)" required>
                    </div>
                    <div id="img-muestra"></div>
                    <div>
                        <input type="submit" value="Enviar Foto"><input type="reset" value="Limpiar Formulario">
                    </div>
                    <div>
                     <?php
                        /*
                        EN ESTA PARTE QUEDARIA AÑADIR LA IMAGEN AÑADIDA AL XML DE USUARIOS
                        */
                            if(isset($_REQUEST['email'])){
                                $xml = simplexml_load_file('../xml/images.xml');
                                $xml['ult_id']  += 1;
                                $imagen = $xml->addChild('imagen');
                                $imagen->addAttribute('id',$xml['ult_id']);

                                $datos = $imagen->addChild('datos');
                                $datos->addChild('propietario',$_REQUEST['email']);
                                $datos->addChild('fecha',date("d.m.y"));
                                $datos->addChild('categoria',$_REQUEST['categoria']);


                                $imagePath = "../images/";
                                $imagename = "img_".$xml['ult_id'].".jpg";
                                $imagetemp = $_FILES['file']['tmp_name'];

                                if(!move_uploaded_file($imagetemp,$imagePath.$imagename)){
                                    echo"<h3 style=\"color: red\">Ha ocurrido un error al mover el archivo.</h3>";
                                    exit();
                                }

                                $imagen->addChild('path',$imagename);
                                $xml->asXML('../xml/images.xml');
                                 echo"<h3 style=\"color: green\">Tu imagen se ha enviado correctamente.</h3>";
                            }

                        ?>
                    
                    </div>
                </form>
        
            </div>
        </section>
    </body>

</html>
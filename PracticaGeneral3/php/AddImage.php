<?php include'Seguridad.php' ?>
<html>
    <head>
        <?php include '../html/Head.html';?>
        <script src="../js/ShowImageInForm.js"></script>
    </head>
    <body>
        <?php include'../php/Menus.php'?>
        <section id="s1" role="main" class="container">
            <div>
                <form id="f-add-image" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Selecciona la categoria de la imagen</label>
                       <select id="categoria" name="categoria" class="custom-select">
                            <option value="paisaje">Paisajes</option><
                            option value="ciudad">Ciudades</option>
                            <option value="deporte">Deportes</option>
                            <option value="animal">Animales</option>
                            <option value="comida">Comida</option>
                            <option value="otra" selected>Otras</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" requiered name="file" onchange="verImagen(this)" accept="image/*">
                            <label class="custom-file-label" for="customFileLang">Seleccionar imagen</label>
                        </div>
                        <div class="form-group" id="div-vacio"></div>
                        <div id="img-muestra">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary" onclick="limpiar()">Reset Form</button>
                   
                </form>
                <div class="alert alert-danger"  style="display:none"role="alert" id="alert-error">
                            Ha habido un error al insertar tu imagen!
                </div>
                    <div class="alert alert-success"  style="display:none"role="alert" id="alert-ok">
                            Tu imagen se ha insertado correctamente!
                    </div>
                
        
            </div>
        </section>
    </body>
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
                            echo "<script>
                            document.getElementById('alert-error').style.display=\"\";
                            </script>";
                            exit();
                        }

                        $imagen->addChild('path',$imagename);
                        $xml->asXML('../xml/images.xml');
                         echo "<script>
                            document.getElementById('alert-ok').style.display=\"\";
                        </script>";
                    }

                ?>

            </div>
</html>
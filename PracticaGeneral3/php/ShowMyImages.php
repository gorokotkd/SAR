<?php include 'Seguridad.php' ?>
<html>
    <head>
        <?php include'../html/Head.html'?>
    </head>
    <body>
        <?php include'../php/Menus.php'?>
        <section id="s1" role="main" class="container">
            <h3 style="text-align: center">Tus Imagenes:</h3>
            <hr>
            <?php
                if(file_exists('../xml/images.xml')){
                    $xml = simplexml_load_file('../xml/images.xml');
                    echo"<table class=\"table-bordered\" style=\"margin-left: auto; margin-right: auto; text-align: center\"><tr class=\"table-active\"><th>Propietario</th><th>Fecha de Subida</th><th>Categoria</th><th>Imagen</th></tr>";

                    foreach($xml->imagen as $imagen){
                        if($_SESSION['email']==$imagen->datos->propietario){
                            echo"<tr><td>".$imagen->datos->propietario."</td><td>".$imagen->datos->fecha."</td><td>".$imagen->datos->categoria."</td><td><img src=\"../images/".$imagen->path."\" width=\"150\" height=\"150\"></td></tr>";
                        }
                    }
                    echo"</table>";
                    $xml->saveXML('../xml/images.xml');
                }else{
                    echo"<h4>Al parecer no existe ninguna imagen, prueba a introducir una a traves del apartado <a href=\"AddImage.php\">Añadir Imagen</a>.</h4>";
                }
            ?>
        </section>
    </body>
</html>
    


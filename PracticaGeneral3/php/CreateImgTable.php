<?php include 'Seguridad.php' ?>
<?php
    $xml = simplexml_load_file('../xml/images.xml');
    echo"<table class=\"table-bordered\" style=\"margin-left: auto; margin-right: auto; text-align: center\"><tr class=\"table-active\"><th>Propietario</th><th>Fecha de Subida</th><th>Imagen</th></tr>";
    foreach($xml->imagen as $imagen){
        if($_GET['tipo']==$imagen->datos->categoria){
            echo"<tr><td>".$imagen->datos->propietario."</td><td>".$imagen->datos->fecha."</td><td><img src=\"../images/".$imagen->path."\" width=\"150\" height=\"150\"></td></tr>";
        }
    }
    echo"</table>";
    $xml->saveXML('../xml/images.xml')
?>
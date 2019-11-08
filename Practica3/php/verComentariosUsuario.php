<html>
    <head>
        <title>Libro de visitas</title>
    </head>
    
    <body style="text-align: center;background-color: beige">
        <div style="margin: 0 auto;">
        <?php
        $xml = simplexml_load_file("../xml/visitas.xml");
        $encontrado = false;
        foreach($xml->xpath("//visita") as $visita){
            if($visita->nombre == $_REQUEST['user']){
                $encontrado = true;
                echo"<p><table border=1>";
                echo"<tr bgcolor = \"#9acd32\">";
                if(isset($visita->email)){
                    $email = $visita->email;
                    if($email["mostrar"]=="si"){
                        echo"<th>{$visita->fecha}</th>";
                        echo"<th>{$visita->nombre}</th>";
                        echo"<th>{$visita->email}</th>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<td colspan=\"3\">{$visita->comentario}</td>";
                        echo"</tr>";
                    }else{
                        echo"<th>{$visita->fecha}</th>";
                        echo"<th>{$visita->nombre}</th>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<td colspan=\"2\">{$visita->comentario}</td>";
                        echo"</tr>";
                    }
                }else{
                    echo"<th>{$visita->fecha}</th>";
                        echo"<th>{$visita->nombre}</th>";
                        echo"</tr>";
                        echo"<tr>";
                            echo"<td colspan=\"2\">{$visita->comentario}</td>";
                        echo"</tr>";
                }


            echo"</table></p>";
            }
            
        }

        if(!$encontrado){
            echo"<h1>No se ha encontrado ningun comentario con el usuario dado.</h1>";
        }
        echo"<a href=\"../html/index.html\">Haz click aqui, para volver al menu principal.</a>";
            ?>
        </div>
    </body>
</html>


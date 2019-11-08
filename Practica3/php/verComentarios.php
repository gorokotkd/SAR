<html>
    <head>
        <title>Visualizacion Comentarios</title>
    </head>
    
    <body style="text-align: center;background-color: beige">
       <?php      
            if(file_exists("../xml/visitas.xml")){
                    $xml = simplexml_load_file("../xml/visitas.xml");
                    foreach($xml->xpath("//visita") as $visita){
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
                    echo"<p ><a href=\"../html/index.html\">Volver al menu principal</a></p>";
                }                      
        ?>
    </body>

</html>
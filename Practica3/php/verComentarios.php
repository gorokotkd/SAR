<html>
    <head>
        <title>Visualizacion Comentarios</title>
    </head>
    
    <body>
       <?php      
            if(file_exists("../xml/visitas.xml")){
                    $xml = simplexml_load_file("../xml/visitas.xml");
                    foreach($xml->xpath("//visita") as $visita){
                        echo"<p><table border=1>";
                            echo"<tr bgcolor = \"#9acd32\">";

                                $email = $visita->email;
                                if($email["mostrar"]=="si"){
                                     echo"<th>".$visita->fecha."     ".$visita->nombre."     ".$visita->email."</th>";
                                }else{
                                     echo"<th>".$visita->fecha."     ".$visita->nombre."</th>";
                                }                               
                            echo"</tr>";
                            echo"<tr>";
                                echo"<td>{$visita->comentario}</td>";
                            echo"</tr>";
                        echo"</table></p>";
                        
                    }
                }                         
        ?>
    </body>

</html>
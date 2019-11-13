<html>
    <head>
        <title>Visualizacion Comentarios</title>
        <script src="../js/showComentAjax.js"></script>
    </head>
    
    <body style="text-align: center;background-color: beige">
       <?php  
            $MAX_STR_SIZE = 15;
            if(file_exists("../xml/visitas.xml")){
                    $xml = simplexml_load_file("../xml/visitas.xml");
                    $tamano = $xml['ult_id']-1;
                    while($tamano>=0){
                        $visita = $xml->visita[$tamano];    
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
                                        $coment = $visita->comentario;
                                        if(strlen($coment)<$MAX_STR_SIZE){
                                            echo"<td colspan=\"3\">{$coment}</td>";
                                        }else{
                                           $comentNuevo = substr($coment,0,15);
                                            echo"<td id='visita".$visita['id']."' colspan=\"3\">{$comentNuevo}<a href='javascript:mostrarComentario({$visita['id']})'>[Mostrar Mas...]</a></td>";
                                        }
                                    echo"</tr>";
                                }else{
                                    echo"<th>{$visita->fecha}</th>";
                                    echo"<th>{$visita->nombre}</th>";
                                    echo"</tr>";
                                    echo"<tr>";
                                        $coment = $visita->comentario;
                                        if(strlen($coment)<$MAX_STR_SIZE){
                                            echo"<td colspan=\"2\">{$coment}</td>";
                                        }else{
                                           $comentNuevo = substr($coment,0,15);
                                            echo"<td id='visita".$visita['id']."' colspan=\"2\">{$comentNuevo}<a href='javascript:mostrarComentario({$visita['id']})'>[Mostrar Mas...]</a></td>";
                                        }
                                    echo"</tr>";
                                }
                            }else{
                                echo"<th>{$visita->fecha}</th>";
                                    echo"<th>{$visita->nombre}</th>";
                                    echo"</tr>";
                                    echo"<tr>";
                                    $coment = $visita->comentario;
                                    if(strlen($coment)<$MAX_STR_SIZE){
                                        echo"<td colspan=\"2\">{$coment}</td>";
                                    }else{
                                       $comentNuevo = substr($coment,0,15);
                                        echo"<td id='visita".$visita['id']."'colspan=\"2\">{$comentNuevo}}<a href='javascript:mostrarComentario({$visita['id']})'>[Mostrar Mas...]</a></td>";
                                    }
                                        
                                    echo"</tr>";
                            }
                                                    

                        echo"</table></p>";
                        $tamano--;
                    }
                    echo"<p ><a href=\"../html/index.html\">Volver al menu principal</a></p>";
                }                      
        ?>
    </body>

</html>
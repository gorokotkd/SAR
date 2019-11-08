<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <script src="../js/validarFormulario.js"></script>
        <title>Libro de visitas</title>
    </head>
    <body style="text-align: center;background-color: beige">
        <h1>Añadir un comentario.</h1>
        <div>
            <form id="fcoment" onsubmit="return validarForm()" action="anadirComentario.php" method="POST">
                <div>
                    <label>Introduce tu nombre de usuario: * </label><br>
                    <input type="text" name="user" placeholder="Usuario">
                </div>
                <div>
                    <label>Introduce tu direccion de correo electronico:</label><br>
                    <input type="text" name="email" size="50" placeholder="alguien@example.com"><br>
                    <input type="checkbox" name="email-public"><label>Deseo hacer publica mi direccion de correo electronico.</label>
                </div>
                <div>
                    <label>Introduce tu comentario: *</label><br>
                    <textarea name="coment" rows="10" cols="50" placeholder="Introduce aqui tu comentario."></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-danger">Enviar</button>
                </div>
                <div>
                    <a href="javascript:history.back()">Haz click aqui para volver a la pagina inicial.</a>
                </div>
            </form>
        </div>
    
    </body>
    
    <div>
        <?php
            if(isset($_REQUEST['user'])){
                if(!file_exists('../xml/visitas.xml')){
                    $archivo = fopen('../xml/visitas.xml','w') or die("No se ha podido crear el archivo");
                    $text = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>\n<!DOCTYPE visitas SYSTEM \"../xml/libro_visitas.dtd\">\n<visitas ult_id=\"0\">\n</visitas>";

                    fwrite($archivo,$text) or die("No se ha podido escribir el archivo.");
                    fclose($archivo);
                }
                 $xml = simplexml_load_file('../xml/visitas.xml');
                //añadir archivos al xml
                $id = (int)$xml['ult_id'];
                //Actualizo la id
                $id=$id+1;
                $xml['ult_id'] = $id;
                
                $visita = $xml->addChild("visita");
                $visita->addAttribute("id",$id);
                
                date_default_timezone_set('CET');
                $visita->addChild("fecha",date('l jS \of F Y h:i:s A'));
                $visita->addChild("nombre",$_REQUEST['user']);
                $visita->addChild("comentario",$_REQUEST['coment']);
                
                if(isset($_REQUEST['email'])){
                    
                    $email = $visita->addChild("email",$_REQUEST['email']);
                    if(isset($_REQUEST['email-public'])){
                        $email->addAttribute("mostrar","si");
                    }else{
                         $email->addAttribute("mostrar","no");
                    }
                }
                
                $xml->asXML('../xml/visitas.xml');
                echo "<script>
                    alert('Comentario añadido correctamente, pulsa aceptar para ver todos los comentarios.');
                    window.location.href='verComentarios.php';
                </script>";
            }
        ?>
    </div>
</html>
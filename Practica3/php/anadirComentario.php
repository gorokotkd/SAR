<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <script src="../js/validarFormulario.js"></script>
    </head>
    <body style="text-align: center;background-color: beige">
        <h1>Añadir un comentario.</h1>
        <div style="background-color:">
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
                
                <button type="submit" class="btn btn-danger">Enviar</button>
            </form>
        </div>
    
    </body>
    
    <div>
        <?php
            if(isset($_REQUEST['user'])){
                if(!file_exists('../xml/visitas.xml')){
                    $archivo = fopen("../xml/visitas.xml","wr") or die("No se ha podido crear el archivo");
                    $text = <<<_END
                    <?xml version="1.0" encoding="UTF-8" standalone="no"?>
                    <!DOCTYPE visitas SYSTEM "../xml/libro_visitas.dtd">
                    <visitas>
                    </visitas>
                    _END;
                    fwrite($archivo,$text) or die("No se ha podido escribir el archivo.");
                    fclose($archivo);
                }
                
                $xml = simplexml_load_file('../xml/visitas.xml');
                //añadir archivos al xml
                $xml->asXML('../xml/visitas.xml');
                
            }
        ?>
    </div>

</html>


      <!--      //Modificams el archivo XML
            $saved  = libxml_use_internal_errors(true);
            $xml    = simplexml_load_file('../xml/Questions.xml');
            $errors = libxml_get_errors();
            libxml_use_internal_errors($saved);
            if (!$xml) {
              var_dump($errors);
              die();
            } else {
              $assessmentItem = $xml->addChild('assessmentItem');
              $assessmentItem->addAttribute('subject', $tema);
              $assessmentItem->addAttribute('author', $email);
              $itemBody = $assessmentItem->addChild('itemBody');
              $itemBody->addChild('p', $enunciado);
              $correctResponse = $assessmentItem->addChild('correctResponse');
              $correctResponse->addChild('value', $respuestac);
              $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
              $incorrectResponses->addChild('value', $respuestai1);
              $incorrectResponses->addChild('value', $respuestai2);
              $incorrectResponses->addChild('value', $respuestai3);

              $xml->asXML('../xml/Questions.xml');
            }-->
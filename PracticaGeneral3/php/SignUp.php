<!DOCTYPE HTML>
<html>
    <head>
        <?php include'../html/Head.html'?>
    </head>
    <body>
        <?php include'../php/Menus.php'?>
        <section id="s1" class="container" role="main">
            <div>
                <form method="post" action="SignUp.php">
                    <div class="form-group">
                        <label for="emailR">Email</label>
                        <input type="email" class="form-control" id="emailR" name="emailR" placeholder="email@ehu.eus" required >
                        <small id="emaildHelpBlock" class="form-text text-muted">
                            El email debe tener el formato de la UPV/EHU, ya sea de alumnos o profesores. Ej: galvarez024@ikasle.ehu.eus o gorka@ehu.eus
                        </small>
                    </div>
                    <div class="alert alert-danger"  style="display:none" role="alert" id="alert-email">
                        El email no es del formato de la UPV/EHU!
                    </div>
                    <div class="alert alert-danger"  style="display:none" role="alert" id="alert-email-repeat">
                        Este email ya esta registrado!
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="passR">Contraseña</label>
                            <input type="password" class="form-control" id="passR" name="passR" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="passR2">Repetir Contraseña</label>
                            <input type="password" class="form-control" id="passR2" name="passR2" required>
                        </div>
                    </div>
                    <div class="alert alert-danger" style="display:none" role="alert" id="alert-pass">
                        Las contraseñas no coinciden!
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellido">Apellido(s)</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                    </div>
                  <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </section>       
    </body>
    
    <?php
        if(isset($_REQUEST['emailR'])){
            
            
            $email = $_REQUEST['emailR'];
            $nombre = $_REQUEST['nombre'];
            $apellido = $_REQUEST['apellido'];
            $pass = $_REQUEST['passR'];
            $passCon = $_REQUEST['passR2'];
            $regexAlu = "/^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$/";
            $regexProf = "/^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$/";
            
            if(preg_match($regexAlu,$email) or preg_match($regexProf,$email)){
                if($pass != $passCon){
                echo "<script>
                    document.getElementById('alert-pass').style.display=\"\";
                </script>";
            }else{
                if(!file_exists('../xml/images.xml')){
                    $archivo = fopen('../xml/users.xml','w') or die("No se ha podido crear el archivo");
                    $text = "<?xml version=\"1.0\"?><users xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:noNamespaceSchemaLocation=\"usersSchema.xsd\">\n</users>";

                    fwrite($archivo,$text) or die("No se ha podido escribir el archivo.");
                    fclose($archivo);
                }
                
                $repetido = false;
                $xml = simplexml_load_file('../xml/users.xml');
                foreach ($xml->xpath('user') as $user){
                    if($user->attributes()->email == $email){
                        $repetido = true;
                    }
                }
                $xml->asXML('../xml/users.xml');
                if($repetido){
                    echo "<script>
                        document.getElementById('alert-email-repeat').style.display=\"\";
                    </script>";
                }else{
                    $user = $xml->addChild('user');
                    $user->addAttribute('email',$email);

                    $user->addChild('nombre', $nombre);
                    $user->addChild('apellidos',$apellido);
                    $user->addChild('pass',$pass);

                    $xml->asXML('../xml/users.xml');

                    echo "<script>
                        alert('Se ha realizado el registro correctamente.');
                        window.location.href='LogIn.php';
                        </script>";
                }
            }
            }else{
                echo "<script>
                    document.getElementById('alert-email').style.display=\"\";
                </script>";
            }
        }
    ?>
</html>
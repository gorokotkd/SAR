<html>
    <head>
        <?php include'../html/Head.html'?>
    </head>
    <body>
        <?php include'../php/Menus.php'?>
        <section id="s1" class="main">
            <div>
                <form method = "post" action = "SignUp.php">
                    <h3>Email (Debe ser de la EHU/UPV) (*)</h3>
                    <input id = "emailR" name = "emailR" required>
                    
                    <h3>Nombre (*)</h3>
                    <input id = "nombre" name = "nombre" required>
                    
                    <h3>Apellido/s (*)</h3>
                    <input id = "apellido" name = "apellido" required>
                    
                    <h3>Contraseña (*)</h3>
                    <input type = "password" id = "passR" name = "passR" minlength = "6" required>
                    
                    <h3>Repetir contraseña (*)</h3>
                    <input type = "password" id = "passR2" name = "passR2" minlength = "6" required>
                    
                    <br><input type = "submit" value = "Registrar">
                </form>
                <?php
                    if(isset($_REQUEST['emailR'])){
                        $email = $_REQUEST['emailR'];
                        $nombre = $_REQUEST['nombre'];
                        $apellido = $_REQUEST['apellido'];
                        $pass = $_REQUEST['passR'];
                        $passCon = $_REQUEST['passR2'];
                        
                        if($pass != $passCon){
                            echo "Las contraseñas no coinciden.";
                        }else{
                            $repetido = false;
                            $xml = simplexml_load_file('../xml/users.xml');
                            foreach ($xml->xpath('user') as $user){
                                if($user->attributes()->email == $email){
                                    $repetido = true;
                                }
                            }
                            $xml->asXML('../xml/users.xml');
                            if($repetido){
                                echo "Ese email ya esta registrado.";
                            }else{
                                $xml = simplexml_load_file('../xml/users.xml');
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
                    }
                ?>
            </div>
        </section>
        
    </body>
</html>
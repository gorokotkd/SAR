<?php
    if (isset($_POST['emailL'])){
        $emailL = $_REQUEST['emailL'];
        $pass = $_REQUEST['passL'];
        $xml = simplexml_load_file('../xml/users.xml');
        $existe = false;
        foreach ($xml->xpath('user') as $user){
            if($user->attributes()->email == $emailL && $user->pass == $pass){
                $existe = true;
            }
        }
        $xml->asXML('../xml/users.xml');
        if(!isset($_SESSION["email"])){
             session_start();
             if($existe){
                 $_SESSION["email"] = $emailL;
            } 
        }
    }
?>
<html>
    <head>
        <?php include'../html/Head.html'?>
    </head>
    <body>
        <?php include'../php/Menus.php'?>
        <section id="s1" class="main">
            <div>
                <form method = "post" action = "LogIn.php">
                    <h3>Email</h3>
                    <input id = "emailL" name = "emailL">
                    
                    <h3>Contraseña</h3>
                    <input type = "password" id = "passL" name = "passL">
                
                    <br><input type = "submit" value = "Iniciar sesion">
                </form>
                <?php
                    if(isset($_REQUEST['emailL'])){
                        $email = $_REQUEST['emailL'];
                        $pass = $_REQUEST['passL'];
                        $existe = false;
                        $xml = simplexml_load_file('../xml/users.xml');
                        foreach ($xml->xpath('user') as $user){
                            if($user->attributes()->email == $email && $user->pass == $pass){
                                $existe = true;
                            }
                        }
                        $xml->asXML('../xml/users.xml');
                        if($existe){
                            echo "<script>
                                    alert('Bienvenido al sistema: $email');
                                    window.location.href='Layout.php';
                                    </script>";
                        }else{
                            echo "Datos de inicio de sesion incorrectos.";
                        }                     
                    }
                ?>
            </div>
        </section>
    </body>
</html>
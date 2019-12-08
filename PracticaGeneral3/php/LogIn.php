<?php session_start();?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php include'../html/Head.html'?>
    </head>
    <body>
        <?php include'../php/Menus.php'?>
        <section id="s1" role="main" class="container">
            <div class="starter-template">
                <form method="post" action="LogIn.php">
                        <div class="form-group">
                            <label for="emailL">Email address</label>
                            <input id="emailL" type="email" class="form-control" name="emailL">
                        </div>
                    
                        <div class="form-group">
                            <label for="passL">Password</label>
                            <input type="password" class="form-control" id="passL" name="passL">
                        </div>
                        <div class="alert alert-danger"  style="display:none" role="alert" id="alert-error">
                            El email o contraseña es incorrecto
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
                    if(isset($_REQUEST['emailL'])){
                        if(file_exists('../xml/users.xml')){
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
                                $_SESSION['email'] = $email;
                                echo "<script>
                                        alert('Bienvenido al sistema: $email');
                                        window.location.href='Layout.php';
                                        </script>";
                            }else{
                                echo "<script>
                                    document.getElementById('alert-error').style.display=\"\";
                                </script>";
                        }
                        }else{
                            echo "<script>
                                document.getElementById('alert-error').style.display=\"\";
                            </script>";
                        }    
                    }
                ?>
            </div>
        </section>
    </body>
</html>
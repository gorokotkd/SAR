<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<div id='page-wrap'>
<?php
    if(!isset($_SESSION['email'])){
        echo "<header class='main' id='h1'>
        <span class='right' id='register'><a href='SignUp.php'>Registro</a></span>
        <span class='right' id='login''><a href='LogIn.php'>Login</a></span>
        </header>";
    }else{
        echo "<header class='main' id='h1'>
        <span class='right' id='logout'><a href='../php/Logout.php'>Logout</a></span>
        </header>";
    }
    if(isset($_SESSION['email'])){
        echo "<nav class='main' id='n1' role='navigation'>
        <span><a href='Layout.php'>Inicio</a></span>
        <span id='add-image'><a href='AddImage.php'>Añadir Imagen</a></span>
        <span id='show-images'><a href='ShowImages.php'>Ver Imagenes</a></span>
        <span><a href='Credits.php'>Creditos</a></span>
        </nav>";
    }else{
        echo "<nav class='main' id='n1' role='navigation'>
        <span><a href='Layout.php'>Inicio</a></span>
        <span id='show-images'><a href='ShowImages.php'>Ver Imagenes</a></span>
        <span><a href='Credits.php'>Creditos</a></span>
        </nav>";
    }
?> 

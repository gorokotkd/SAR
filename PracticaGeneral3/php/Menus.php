<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="../php/Layout.php">Practica General SAR</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../php/Layout.php">Inicio</a>
      </li>
      <li class="nav-item">
          <span id="add-images" style="display:none;"><a class="nav-link" href="../php/AddImage.php">Añadir Imagenes</a></span>
      </li>
      <li class="nav-item">
        <span id="show-images" style="display:none;"><a class="nav-link" href="../php/ShowImages.php">Ver Imagenes</a></span>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-1">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <span id="login"><a class="nav-link" href="../php/LogIn.php">Log In</a></span>
            </li>
            <li class="nav-item">
                <span id="register"><a class="nav-link" href="../php/SignUp.php">Register</a></span>
            </li>
            <li class="nav-item">
                <span id="logout" style="display:none;"> <a class="nav-link" href="../php/LogOut.php">Log Out</a></span>
            </li>
        </ul>
    </form>
  </div>
</nav>

<?php
    if(isset($_SESSION['email'])){
        echo "<script>
            document.getElementById('login').style.display=\"none\";
            document.getElementById('register').style.display=\"none\";
            document.getElementById('logout').style.display=\"\";
            
            document.getElementById('add-images').style.display=\"\";
            document.getElementById('show-images').style.display=\"\";
        </script>";
    }else{
        echo "<script>
            document.getElementById('login').style.display=\"\";
            document.getElementById('register').style.display=\"\";
            document.getElementById('logout').style.display=\"none\";
            
            document.getElementById('add-images').style.display=\"none\";
            document.getElementById('show-images').style.display=\"none\";
        </script>";
    }
?>

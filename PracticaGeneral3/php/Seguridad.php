<?php
    if(!isset($_SESSION)){
        session_start();
        if(!isset($_SESSION["email"])){
            echo "<script>
                    alert('No puede acceder a esta página sin estar logeado.');
                    window.location.href='Layout.php';    
                </script>";
            exit();
        }
    }
?>
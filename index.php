<?php
    session_start();

    if ( !isset($_SESSION["email"]) ){
        header("location:login.php");
        exit();
    }

    print_r($_SESSION['email']);
?>

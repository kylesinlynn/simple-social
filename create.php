<?php
    session_start();

    if ( !isset($_SESSION["email"]) ){
        header("location:login.php");
        exit();
    }

    require_once('database/Post.php');
    require_once('database/Auth.php');

    if ($_POST['content']) {
        print_r($post->createPost(
            $_POST['content'],
            1,
            $auth->getUser($_SESSION['email'])['id']
        ));
    }

    header('location:.');
    exit();
?>
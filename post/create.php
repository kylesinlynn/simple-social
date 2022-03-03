<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header('location:..');
    }

    require_once('../database/Auth.php');
    require_once('../database/Post.php');

    if ($_POST['content']) {
        print_r($post->createPost($_POST['content'], 1, $auth->getUser($_SESSION['email'])['id']));
    }

    header('location:..');
    exit();
?>
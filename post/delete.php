<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header('location:..');
    }

    require_once('../database/Post.php');
    require_once('../database/Auth.php');
    require_once('../database/Permission.php');

    if ($permit->deletePost($auth->getUser($_SESSION['email'])['id'], $post->getPost($_GET['id'])['uid'])) {
        $post->deletePost($_GET['id']);
    }

    header('location:..');
    exit();
?>
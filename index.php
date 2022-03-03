<?php
session_start();

require_once('database/Auth.php');
require_once('database/Post.php');
require_once('database/Permission.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($_SESSION['email'])) {

    if ($_POST['password_confirmation']) {
        $register = $auth->register($_POST['email'], $_POST['password'], $_POST['password_confirmation']);
    } else {
        $login = $auth->login($_POST['email'], $_POST['password']);

        if ( $login['user'] ) {
            $_SESSION['email'] = $_POST['email'];
        }
    }
}
?>

<?php include_once('include/header.php'); ?>

<div class='container'>
    <?php
    if (!isset($_SESSION['email'])) {
        if (isset($_GET['register'])) {
            include_once('auth/register.php');
        } else {
            include_once('auth/login.php');
        }
    } else {
        $posts = $post->getAllPosts();
        require_once('post/posts.php');
    }

    ?>
</div>

<?php include_once('include/footer.php'); ?>
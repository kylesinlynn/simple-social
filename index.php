<?php
    session_start();

    if ( !isset($_SESSION["email"]) ){
        header("location:login.php");
        exit();
    }

    require_once('database/Post.php');
    require_once('database/Auth.php');

    $posts = $post->getAllPosts();
?>

<div>
    <?php echo $_SESSION['email']; ?>
    <a href="logout.php">Logout</a>
</div>

<form action="create.php" method="post">
    <div>
        <input type="text" name="content">
    </div>

    <div>
        <button type="submit">Post</button>
    </div>
</form>

<div>
    <?php for($post = 0; $post < count($posts); $post++): ?>
        <div>
            <?php echo $auth->getUserById($posts[$post]['uid'])['email'] . ' >> ' . $posts[$post]['content']; ?>
            <a href="delete.php?id=<?php echo $posts[$post]['id'] ?>">delete</a>
        </div>
    <?php endfor; ?>
</div>

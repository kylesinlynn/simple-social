<?php 
    if (!isset($_SESSION['email'])) {
        header('location:..');
    }
?>
<div class="container-fluid" style="margin-top: 1rem;">
    <div class="row justify-content-center col-8" style="margin: auto;">
        <form class="d-flex" action="post/create.php" method="post">
            <input class="form-control me-2" type="text" name="content" placeholder="What's in you mind?">
            <button class="btn btn-outline-success col-2" type="submit">Post</button>
        </form>
    </div>

    <?php for ($index = 0; $index < count($posts); $index++) { ?>
        <div class="card col-8" style="margin: 1rem auto;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $auth->getUserById($posts[$index]['uid'])['email']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $posts[$index]['created_at']; ?></h6>
                <p class="card-text"><?php echo $posts[$index]['content']; ?></p>
                <?php if ($permit->deletePost($auth->getUser($_SESSION['email'])['id'], $posts[$index]['uid'])) { ?>
                    <a class="card-link btn btn-outline-danger" href="post/delete.php?id=<?php echo $posts[$index]['id'] ?>">Delete</a>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
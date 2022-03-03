<div class="container-fluid">
    <div class="row justify-content-center">
        <form action="index.php" method="post">
            <legend class="row justify-content-center">Login</legend>
            <?php if ($login): ?>
                <div class="alert alert-warning mb-3 col-4" role="alert" style="margin: auto;">
                    <?php echo $login['status']; ?>
                </div>
            <?php endif; ?>
                </div>
            <div class="mb-3 col-4" style="margin: auto;">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 col-4" style="margin: auto;">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 col-4" style="margin: auto;">
                <input type="submit" value="Login" class="form-control btn btn-outline-success">
            </div>
        </form>
    </div>
</div>

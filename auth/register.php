<div class="container-fluid">
    <div class="row justify-content-center">
        <form action="index.php?register=true" method="post">
            <legend class="row justify-content-center">Register</legend>
            <?php if ($register) { ?>
                <div class="alert alert-warning mb-3 col-4" role="alert" style="margin: auto;">
                    <?php echo $register; ?>
                </div>
            <?php } ?>
            <div class="mb-3 col-4" style="margin: auto;">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 col-4" style="margin: auto;">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 col-4" style="margin: auto;">
                <label for="password_confirmation" class="form-label">Repeat Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="mb-3 col-4" style="margin: auto;">
                <input type="submit" value="Register" class="form-control btn btn-outline-success">
            </div>
        </form>
    </div>
</div>

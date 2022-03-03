<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Social</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="static/styles/home.css">
    <link rel="stylesheet" href="static/styles/auth.css">
    <link rel="stylesheet" href="static/styles/post.css">
    <script src="static/scripts/app.js"></script>
</head>
<body style="width: 60rem; margin: auto;">
    <header>
        <nav class="navbar navbar-light container" style="width: 60rem; background-color: #e3f2fd;">
            <div class="container-fluid">
                <?php if (isset($_SESSION['email'])): ?>
                    <a class="navbar-brand"><?php echo $_SESSION['email']; ?></a>
                    <button onclick="window.location.href='auth/logout.php';" class="btn btn-danger">Logout</button>
                <?php else: ?>
                    <button onclick="window.location.href='index.php';" class="btn btn-success">Login</button>
                    <button onclick="window.location.href='index.php?register=true';" class="btn btn-info">Register</button>
                <?php endif; ?>
            </div>
        </nav>
    </header>
<?php 
    session_start();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        require_once('database/Database.php');

        if ( $db->login( $_POST['email'], $_POST['password'] ) ) {
            $_SESSION['email'] = $_POST['email'];
        } else {
            header('location:login.php?error=true');
            exit();
        }
    }

    if ( isset($_SESSION['email']) ) {
        header('location:.');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <form action="login.php" method="post">
        <div>
            <?php if ($_GET['error']): ?>
                <p>Credentials are wrong.</p>
            <?php endif; ?>
        </div>    

        <div>
            <input type="text" name="email" placeholder="Email" required>
        </div>

        <div>
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
    
</body>
</html>
<?php 
    session_start();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        require_once('database/Auth.php');

        $login = $auth->login($_POST['email'], $_POST['password']);
        if ( $login['user'] ) {
            $_SESSION['email'] = $_POST['email'];
        }

    }

    if ( isset($_SESSION['email']) ) {
        header('location:.');
        exit();
    }

?>

<form action="login.php" method="post">
    <div>
        <p><?= $login['status'] ?></p>
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

    <div>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</form>

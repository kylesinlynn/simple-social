<?php 
    session_start();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        require_once('database/Database.php');

        if ( !$db->checkUser($_POST['email']) ) {
            header('location:login.php?user=false');
            exit();
        } else if ( $db->login( $_POST['email'], $_POST['password'] ) ) {
            $_SESSION['email'] = $_POST['email'];
        } else {
            header('location:login.php?error=true');
            exit();
        }
    }

    if ( isset($_SESSION['email']) ) {
        header('location:.');
        exit();
    }

?>

<form action="login.php" method="post">
    <div>
        <?php if ($_GET['error']): ?>
            <p>Credentials are wrong.</p>
        <?php elseif($_GET['user']): ?>
            <p>User does not exists. <a href="register.php">Register</a></p>
        <?php elseif($_GET['register']): ?>
            <p>User registered. Please, login!</p>
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

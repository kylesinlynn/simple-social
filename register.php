<?php 
    session_start();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        require_once('database/Database.php');

        if ( $db->checkUser($_POST['email']) ) {
            header('location:register.php?user=true');
            exit();
        } else if ( $db->register( $_POST['email'], $_POST['password'], $_POST['password_confirmation'] ) ) {
            header('location:login.php?register=true');
            exit();
        } else {
            header('location:register.php?error=true');
            exit();
        }
    }

    if ( isset($_SESSION['email']) ) {
        header('location:.');
        exit();
    }

?>

<form action="register.php" method="post">
    <div>
        <?php if ($_GET['error']): ?>
            <p>Enter valid information.</p>
        <?php elseif($_GET['user']): ?>
            <p>User already exists. <a href="login.php">Login</a></p>
        <?php endif; ?>
    </div>    

    <div>
        <input type="text" name="email" placeholder="Email" required>
    </div>

    <div>
        <input type="password" name="password" placeholder="Password" required>
    </div>

    <div>
        <input type="password" name="password_confirmation" placeholder="Password" required>
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>

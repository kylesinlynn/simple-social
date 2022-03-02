<?php 
    session_start();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        require_once('database/Auth.php');
        
        $register = $auth->register($_POST['email'], $_POST['password'], $_POST['password_confirmation']);
    }

    if ( isset($_SESSION['email']) ) {
        header('location:.');
        exit();
    }

?>

<form action="register.php" method="post">
    <div>
    </div>    
        <p><?= $register ?></p>
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

    <div>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</form>

<?php 
    session_start();
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
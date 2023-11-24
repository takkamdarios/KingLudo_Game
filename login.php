<?php

session_start();

require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if($user && password_verify($passsword, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSIO?['username'] = $user['username'];

        header("Location: user_dashboard.php");
        exit; 
    }else{
        $error = "Invalid username or password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    
        <h1>Login</h1>
    
        <?php if(isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
    
        <form action="login.php" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
</body>
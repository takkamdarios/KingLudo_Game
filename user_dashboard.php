<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: login.php");
    exit;
}

require_once 'db.php';

try{
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
} catch(PDOException $e){
    die('Error:' .$e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Hi , <b> <?php echo htmlspecialchars($user['username']); ?> </b>. Welcome to your Dashboard </h1>
        <p>
            <a href="logout.php">Logout</a>
        </p>

        <div>
            <h3>Your Game Statistics:</h3>
            <p>Games Played: <?php echo htmlspecialchars($user['games_played']); ?> </p>
            <p>Games Won: <?php echo htmlspecialchars($user['games_won']); ?></p>
        </div>

        <div>
            <h3>Play Ludo:</h3>
            <p><a href='ludo.html'> Start a new game </a></p>
        </div>
    </body>
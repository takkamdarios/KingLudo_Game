<?php
$host = 'localhost';
$db = 'ludo_game';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = 'mysql:host='.$host.';dbname='.$db.';charset='.$charset;

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try{
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch(PDOException $e){
    throw new PDOException($e->getMessage());
}
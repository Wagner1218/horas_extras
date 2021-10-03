<?php

$servername = "localhost";
$database = "overtime_control";
$username = "root";
$password = "";
$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($sql, $username, $password, $dsn_Options);
} catch (PDOException $error) {
    echo 'Erro de conexão: ' . $error->getMessage();
}
?>
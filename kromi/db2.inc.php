<?php
session_start();
$dsn = "mysql:host=localhost;dbname=kromatik_wrld";
$dbusername = "kromatik_wrld";
$dbpassword = "Ujjelszo69";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Csatlakozási hiba: " . $e->getMessage();
}
function is_logged_in()
{
    return isset($_SESSION['username']);
}
/*
function get_connection() {
    return new PDO('mysql:host=localhost;dbname=kromatik_wrld;charset=utf8', "root","");
}*/

function getConnection()
{
    global $pdo;
    return $pdo;
}

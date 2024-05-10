<?php

session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'kromatik_wrld');

$menu = array(
    'Home' => 'index.php',
    'Users' => 'users.php',
    'Login' => 'login.php',
    'Register' => 'register.php',
);

function is_logged_in() {
    return isset($_SESSION['username']);
}

function get_connection() {
    return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
}

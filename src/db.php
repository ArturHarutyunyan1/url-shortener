<?php
$host     = '';
$user     = '';
$password = '';
$dbname   = '';

$dsn = "mysql:host=" . $host . ";dbname=" . $dbname;

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (\Throwable $th) {
    throw $th;
}

?>
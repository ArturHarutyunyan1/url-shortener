<?php
require '../src/db.php';

$id = $_GET['id'];

$stmt = $pdo -> query("SELECT * FROM `short_urls` WHERE `id` = '$id'");

$url = $stmt -> fetch();

if($stmt){
    header("location: " . $url['main_url']);
}

?>
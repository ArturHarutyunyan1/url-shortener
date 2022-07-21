<?php
require './db.php';
include './auth/auth.php';

$author = $_SESSION['email'];


function getRandStr($len){
    $characters       = 'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ0123456789';
    $charactersLength = strlen($characters);
    $rand             = '';

    for($i = 0; $i < $len; $i++){
        $rand .= $characters[rand(0, $charactersLength - 1)];
    }
    return $rand;
}

if(isset($_REQUEST['send'])){
    $id        = getRandStr(5);
    $main_url  = stripslashes($_REQUEST['main_url']);
    $short_url = 'localhost/r?i=' . $id;

    $stmt = $pdo -> query("INSERT INTO `short_urls` (`id`, `main_url`, `short_url`, `author`) VALUES ('$id', '$main_url', '$short_url', '$author')");

    if($stmt){
        header("location: ../index.php");
    }

}

if(isset($_REQUEST['clear'])){
    $stmt = $pdo -> query("DELETE FROM `short_urls` WHERE `author` = '$author'");

    if($stmt){
        header("location: ../index.php");
    }
}

?>
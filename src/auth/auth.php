<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: ./src/auth/login.php");
    exit();
}

?>
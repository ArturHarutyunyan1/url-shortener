<?php
require '../db.php';
session_start();

if(session_destroy()){
    header("location: ./login.php");
}

?>
<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location:/ProjectM6/View/login.php");
}
?>
<?php
session_start();



if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
    

    include_once ('config.php');
    include 'layout/header.php'; 
    include 'layout/topmenu.php';
    include 'layout/sidebar.php';
    include 'layout/main.php';
    include 'layout/footer.php';
?>


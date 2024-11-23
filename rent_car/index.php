<?php 
session_start();
// if(isset($_SESSION['user'])) {
//     echo $_SESSION['user'];
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'templates/head-common.php' ?>
    <title>Прокат автомобилей в Орле</title>
</head>
<body>
    <main>

    <?php 

    include 'templates/header.php'; 
    include 'templates/navbar.php';
    include 'functions/scr-catalog.php';

    if (isset($_GET['p'])) {
        $page_id = $_GET['p'];
    } else { 
        $page_id = "main";
    }

    if (isset($_GET["class"])) {
        $page_id = "catalog";
    }

    if(isset($_POST["btn1"])) {
        $page_id = "catalog";
    }

    // if (isset($_GET['p']) && $_GET['p'] == "auth") {
    //     $_SESSION['msg'] = 1;
    // } 

    include "{$page_id}.php";

    include 'templates/footer.php' 
    
    ?>
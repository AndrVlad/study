<?php
session_start();
    include 'db-connect.php';
    print_r($_POST);
    delete_card($_POST['car_id']);
    $_SESSION["delete_card"] = 1;
    header("Location: ../delete-card.php");
?>
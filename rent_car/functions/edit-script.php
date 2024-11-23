<?php
session_start();
    include 'db-connect.php';
    print_r($_POST);
    update_card($_SESSION['car_id'],$_POST['description'],$_POST['rent_price']);
    $_SESSION["edit_card"] = 1;
    header("Location: ../edit-card.php");
?>
<?php

session_start();
print_r($_POST);
include 'db-connect.php';
$enter = FALSE;

$ck_login = get_login($_POST['login']);
$ck_pass = get_pass($_POST['login'],md5($_POST['password']));
if ($ck_login == 0 && $ck_pass == 0) {
    echo "Вошли";
    $user_type = get_user($_POST['login']);
    $_SESSION['user'] = $user_type;
    header("Location: ../index.php");   
    
} else {
    $_SESSION['msg'] = 1;
    header("Location: ../index.php?p=auth");
} 

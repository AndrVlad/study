
<?php
session_start();
print_r($_POST);
include 'db-connect.php';

$send = TRUE;

$login = $_POST["login-reg"];
$pass = $_POST["password"];
$name = $_POST["name"];
$f_name = $_POST["first_name"];
$phone = $_POST["phone"];
$email = $_POST["email"];

// Проверка валидации для логина
function validateLogin($login) {
    $pattern = '/^[\w]{6,20}$/';
    return preg_match($pattern, $login);
}

// Проверка валидации для пароля
function validatePassword($password) {
    $pattern = '/[A-Za-z0-9]{6,}$/';
    return preg_match($pattern, $password);
}

// Проверка валидации для имени
function validateName($name) {
    $pattern = '/^[а-яА-ЯЁё\s]+$/u';
    return preg_match($pattern, $name);
}

// Проверка валидации для номера телефона
function validatePhone($phone) {
    $pattern = '/^[7,8]\d{10}$/';
    return preg_match($pattern, $phone);
}

// Проверка валидации для email
function validateEmail($email) {
    $pattern = '/^\S+@\S+\.\S+$/';
    return preg_match($pattern, $email);
}

if (!validateLogin($login)) {
    $send = FALSE;
    $_SESSION["r_login"] = "Недопустимый логин";
}

// $ck_login = check_login($login);
// if ($ck_login && $ck_login->rowCount() == 0) {
//     echo "Пустой результат запроса.";
// } else {
//     echo "Результат запроса не пустой.";
// }

/*if (!validatePassword($password)) {
    $send = FALSE;
    $_SESSION["r_pass"] = "Недопустимый пароль";
}*/

if (!validateName($name)) {
    $send = FALSE;
    $_SESSION["r_name"] = "Недопустимое имя";
}

if (!validateName($f_name)) {
    $send = FALSE;
    $_SESSION["r_fname"] = "Недопустимая фамилия";
}

if (!validatePhone($phone)) {
    $send = FALSE;
    $_SESSION["r_phone"] = "Недопустимый номер телефона";
}

if (!validateEmail($email)) {
    $send = FALSE;
    $_SESSION["r_email"] = "Недопустимый email";
}


if ($send == FALSE) {
    header("Location: ../registration.php");
} else {
    $_SESSION["success"] = "Вы зарегистрированы! Войдите, используя логин и пароль";
    $password = md5($pass);
    registration($login, $password, $f_name, $name,$phone,$email);
    header("Location: ../registration.php");
}
?>

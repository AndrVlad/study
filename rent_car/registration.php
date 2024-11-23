<?php
session_start();
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

    ?>

<section class="main-content auth-content">

    <div class="auth">
    <?php
        if(isset($_SESSION["success"])) {
            echo '<div class="auth">
            <p class="msg" style="color: green;">Вы зарегистрированы! Войдите, используя логин и пароль</p>
            </div>';
        }
        unset($_SESSION["success"]);
    ?>
        <h1>Регистрация на сайте</h1>
        <h3>Введите учетные данные</h3>
        <form action="functions/reg-scr.php" method="POST">
            <label for="login-reg">
                  Ваш логин:
              </label>
            <input type="text"
                   id="login-reg"
                   name="login-reg"
                   placeholder="Символы латиницы, цифры и знак _" required
                   minlength="6" maxlength="20">
                <?php
                    if(isset($_SESSION["r_login"])) {
                        echo '<div class="msg">'.$_SESSION["r_login"].'</div>';
                    }
                    unset($_SESSION["r_login"]);
                ?>
                
            <label for="password">
                  Ваш пароль:
              </label>
            <input type="password"
                   id="password"
                   name="password"
                   placeholder="8 символов латиницы, одна цифра 0-9 и один символ !@#$%^&*" required
                   minlength="8" maxlength="20">
                <?php
                    if(isset($_SESSION["r_pass"])) {
                        echo '<div class="msg">'.$_SESSION["r_pass"].'</div>';
                    }
                    unset($_SESSION["r_pass"]);
                ?>
                <h3>Введите сведения о себе:</h3>
            <label for="login-reg">
                Имя:
            </label>
            <input type="name"
                   id="name"
                   name="name"
                   placeholder="Только символы кириллицы" required>
                <?php
                    if(isset($_SESSION["r_name"])) {
                        echo '<div class="msg">'.$_SESSION["r_name"].'</div>';
                    }
                    unset($_SESSION["r_name"]);
                ?>
            <label for="first_name">
                Фамилия:
            </label>
            <input type="text"
                   id="first_name"
                   name="first_name"
                   placeholder="Только символы кириллицы" required>
                <?php
                    if(isset($_SESSION["r_fname"])) {
                        echo '<div class="msg">'.$_SESSION["r_fname"].'</div>';
                    }
                    unset($_SESSION["r_fname"]);
                ?>
            <label for="phone">
                Номер телефона:
            </label>
            <input type="text"
                   id="phone"
                   name="phone"
                   placeholder="Номер телефона, начиная с 7" required
                   minlength="11" maxlength="11">
                <?php
                    if(isset($_SESSION["r_phone"])) {
                        echo '<div class="msg">'.$_SESSION["r_phone"].'</div>';
                    }
                    unset($_SESSION["r_phone"]);
                ?>
            <label for="email">
                Адрес электронной почты:
            </label>
            <input type="text"
                   id="email"
                   name="email"
                   placeholder="Адрес почты" required>
                <?php
                    if(isset($_SESSION["r_email"])) {
                        echo '<div class="msg">'.$_SESSION["r_email"].'</div>';
                    }
                    unset($_SESSION["r_email"]);
                ?>
            <div class="wrap">
                <button type="submit">
                    Регистрация
                </button>
            </div>
        </form>
    </div>
            
</section>

<?php
    include 'templates/footer.php';

    ?>
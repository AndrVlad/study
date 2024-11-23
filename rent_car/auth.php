<section class="main-content auth-content">

<?php
if(isset($_SESSION['msg'])) {
            echo '<div class="auth">
            <p class="msg" style="color: red;">Неверный логин или пароль</p>
            </div>';
        }
        unset($_SESSION['msg']);
?>
    <div class="auth">
        <h1>Вход на сайт</h1>
        <h3>Введите учетные данные</h3>
        <form action="functions/auth-scr.php" method="POST">
            <label for="login">
                  Имя пользователя:
              </label>
            <input type="text"
                   id="login"
                   name="login"
                   placeholder="Введите логин" required>
 
            <label for="password">
                  Пароль:
              </label>
            <input type="password"
                   id="password"
                   name="password"
                   placeholder="Введите ваш пароль" required>
 
            <div class="wrap">
                <button type="submit">
                    Войти
                </button>
            </div>
        </form>
        <p>Еще не зарегистрированы? 
              <a href="registration.php">
                Создать аккаунт
            </a>
        </p>
    </div>
            
        </section>
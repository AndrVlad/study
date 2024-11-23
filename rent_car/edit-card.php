<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user'] != 2) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}
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

    
        <?php
        if(isset($_SESSION["edit_card"])) {
                        echo '<div class="auth">
                        <p class="msg" style="color: green;">Изменения сохранены</p>
                        </div>';
                    }
                    unset($_SESSION["edit_card"]);
            
        ?>
    <p><a href = "admin.php">На главную</a></p>
    <div class="edit">
        <h1>Редактирование информации</h1>
        <form method="POST" action="edit-scr.php">
        <table>
            <tr>
                <th>Выбор</th>
                <th>ID карточки</th>
                <th>Марка</th>
                <th>Модель</th>
                <th>Год выпуска</th>
                <th>Стоимость проката</th>
            </tr>
            <?php
            $card_list = get_card_list();
            foreach ($card_list as $card) {
                echo "<tr>";
                echo "<td><input type='radio' name='car_id' value='".$card['car_id']."'></td>";
                echo "<td>".$card['car_id']."</td>";
                echo "<td>".$card['brand_name']."</td>";
                echo "<td>".$card['car_model_name']."</td>";
                echo "<td>".$card['release_date']."</td>";
                echo "<td>".$card['rent_price']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <input type="submit" name="edit" value="Редактировать">
        </form>
        </div>
            
        </section>

<?php
    include 'templates/footer.php';

    ?>
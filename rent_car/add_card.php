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

    
        <?php
        if(isset($_SESSION["add_card"])) {
                        echo '<div class="auth">
                        <p class="msg" style="color: green;">Карточка добавлена успешно</p>
                        </div>';
                    }
                    unset($_SESSION["add_card"]);
        
        ?>
    <p><a href = "admin.php">На главную</a></p>
    <div class="auth">
        <h1>Добавление информации</h1>
        <form action="functions/add-scr.php" method="POST" enctype="multipart/form-data">
            <label for="car_model_id">
                Выбор из имеющихся моделей автомобилей
            </label>
            <select id="car_model_id" name="car_model_id" required>
            <?php
                $exist_models = get_exists_models(); 
                foreach ($exist_models as $val): ?>
                <option value=<?=$val["car_model_id"] ?>><?php echo $val['brand_name']." ".$val['car_model_name']." ".$val['car_class_name'] ?></option>
            <?php endforeach; ?>
            </select>

            <label for="body">
                Тип кузова
            </label>
            <select id="body" name="body" required>
            <?php
                $bodies = get_body(); 
                foreach ($bodies as $val): ?>
                <option value=<?=$val["body_id"] ?>><?=$val["body_name"] ?></option>
            <?php endforeach; ?>
            </select>

            <label for="color">
                Цвет
            </label>
            <select id="color" name="color" required>
            <?php
                $colors = get_color(); 
                foreach ($colors as $val): ?>
                <option value=<?=$val["color_id"] ?>><?=$val["color_name"] ?></option>
            <?php endforeach; ?>
            </select>
            
            <label for="transmission">
                Тип КПП
            </label>
            <select id="transmission" name="transmission" required>
            <?php
                $tr = get_transmission(); 
                foreach ($tr as $val): ?>
                <option value=<?=$val["transmission_id"] ?>><?=$val["transmission_name"] ?></option>
            <?php endforeach; ?>
            </select>

            <label>
                Год выпуска
            </label>
                <input type="text" name="release date" placeholder="Год" required
                minlength="4" maxlength="4" pattern="\d\d\d\d">
            
            <label>
                Описание
            </label>
                <textarea name="description" placeholder="Введите текст" maxlength="1500"></textarea>
            
            <label>
                Стоимость проката
            </label>
                <input type="text" name="rent_price" placeholder="Стоимость" required
                minlength="4" maxlength="6" pattern="\d{3,}">

            <label>
                Изображение карточки
            </label>
                <input type="file" name="card_img">
                <?php
                    if(isset($_SESSION["msg"])) {
                        echo '<div class="msg">'.$_SESSION["msg"].'</div>';
                    }
                    unset($_SESSION["msg"]);
                ?>
            
            <label>
                Альбом изображений автомобиля
            </label>
                <input type="file" name="gallery[]" multiple>

            <div class="wrap">
                <button type="submit">
                    Добавить
                </button>
            </div>
        </form>
    </div>
            
        </section>

<?php
    include 'templates/footer.php';

    ?>
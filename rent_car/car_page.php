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
    
    if (isset($_GET['id'])) {
        $article_id = $_GET['id'];
        
    } 
    $f_car_image = get_car_images(1, $article_id);
    $o_car_image = get_car_images(3, $article_id);
    $car_row = get_data_car_page($article_id);
    //include "articles/art{$article_id}-car_page.php";
    ?>

    <?php foreach($car_row as $val): ?>
        <section class="main-content car-page-content">
            <div class="car-page-container">
                <header class="car-page-header">
                    <h1><?=$val["brand_name"] ?></h1>
                </header>
                <section class="wrap-car-image-spec">
                <div class="car-images">
                    <?php foreach($f_car_image as $f_img): ?>
                    <div class="choosen-car-image">
                        <img class="chosen-image" src="<?=$f_img["link_car_image"]?>" alt="">
                    </div>
                    <?php endforeach ?>
                    <div class="gallery-car-images">
                        <?php foreach($o_car_image as $o_img): ?>
                        <div class="wrap-inactive-img">
                            <img class="inactive-image" src="<?=$o_img["link_car_image"]?>" alt="">
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="car-specifications">
                    <ul class="header-car-spec">
                        <li><h3>Класс:</h3></li>
                        <li><h3>Модель:</h3></li>
                        <li><h3>Год выпуска:</h3></li>
                        <li><h3>Тип кузова:</h3></li>
                        <li><h3>КПП:</h3></li>
                        <li><h3>Цвет:</h3></li>
                    </ul>
                    <ul class="car-spec-values">
                        <li><h3><?=$val["car_class_name"] ?></h3></li>
                        <li><h3><?=$val["car_model_name"] ?></h3></li>
                        <li><h3><?=$val["release_date"] ?></h3></li>
                        <li><h3><?=$val["body_name"] ?></h3></li>
                        <li><h3><?=$val["transmission_name"] ?></h3></li>
                        <li><h3><?=$val["color_name"] ?></h3></li>
                    </ul>
                </div>
                </section>
                <div class="car-description">
                    <header class="header-desc">
                        <h3>Описание:</h3>
                    </header>
                    <div class="text-description">
                        <p><?=$val["description"] ?></p>
                    </div>
                </div>
            </div>
        </section>

        <?php endforeach ?>

    <?php
    include 'templates/footer.php';

    ?>
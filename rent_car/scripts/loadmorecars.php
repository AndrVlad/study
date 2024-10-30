<?php
require '..\functions\db-connect.php'; // Ваш файл соединения с БД

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = 2; // Количество карточек для загрузки

function load_main_card_data($offset, $limit) {
    global $db;
    $q = $db->query("SELECT car.car_id, release_date, rent_price, 
    car_model.car_model_name, brand.brand_name, card_image.link_card_image 
    FROM car JOIN car_model 
    ON car.car_model_id = car_model.car_model_id JOIN brand 
    ON brand.brand_id = car_model.brand_id JOIN card_image 
    ON card_image.card_image_id = car.card_image_id 
    LIMIT $offset, $limit");
    return $q->fetchAll(PDO::FETCH_ASSOC);
    
}

$cars = load_main_card_data($offset, $limit);
echo json_encode($cars);

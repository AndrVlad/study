<?php foreach($card_car as $val_card): ?>
<div class="car_card car-card-catalog">
                        <a href="car_page.php?id=<?=$val_card["car_id"] ?>">
                            <div class="top_card top-card-catalog">
                                <img src="<?=$val_card["link_card_image"] ?>" alt="картинка автомобиля на карточке">
                            </div>
                            <div class="desc_card-catalog">
                                <div class="card-price">
                                    <p><?=$val_card["rent_price"] ?>₽ в день</p>
                                </div>
                                <div class="card-properties">
                                    <p><?=$val_card["brand_name"] ?> <?=$val_card["car_model_name"] ?></p>
                                    <p><?=$val_card["release_date"] ?></p>
                                    <p><?=$val_card["transmission_name"] ?></p>
                                </div>
                                <div class="card-btn">
                                    <button class="btn-detailed">Подробнее</button>
                                </div>
                            </div>
                        </a>
                        </div>
<?php endforeach ?>
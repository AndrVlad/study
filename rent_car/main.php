
<div id="discountCountdown">
    <p class="countdown-item">00</p>
    <p class="countdown-item">00</p>
    <p class="countdown-item">00</p>
</div>
<h3 style="color: blue; text-align: center;">Осталось до действия скидки 25% на BMW520D</h3>
<button class="btn-detailed" style="width: 300px" onclick="openModal()">Подробнее</button>
<script src="js-scr.js"></script>

<div id="modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Успейте забронировать BMW 520D</h2>
        <div class="skid" style="display: flex;">
            <h2 style="text-decoration: line-through;">Вместо 15000₽</h2>
        </div>
        <img src="resources\bmw1.jpg" style="display: block; margin: 0 auto; height: 250px;">
        <h1 style="color: red;">10000₽</h2>
        
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }
</script>

<section class="main-content">

            <div class="banner">
                <img src="resources/1.jpg" alt="картинка автопрокат в Орле">
            </div>

            <h1>Выбирают у нас:</h1>
            <div class="grid-container">
                <div class="grid-cars">

                <?php 
                    $main_cards = get_main_card_data(2);
                    foreach($main_cards as $val):
                ?>

                <div class="car_card">
                        <a href="car_page.php?id=<?=$val["car_id"] ?>">
                            <div class="top_card">
                                <img src=<?=$val["link_card_image"]?> alt="картинка автомобиля на карточке">
                            </div>
                            <div class="desc_card">
                                <p><?php echo $val["brand_name"]; echo " ".$val["car_model_name"]; ?></p>
                                <p><?=$val["release_date"] ?></p>
                                <p><?=$val["rent_price"]+0 ?>₽</p>
                            </div>
                        </a>
                </div>

                <?php endforeach; ?>  
                </div>
            </div>

            <div class="more">
                <a href = "index.php?p=catalog">
                    <h2>Подробнее</h2>
                </a>
            </div>
</section> 
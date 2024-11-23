<?php 
    $cards = [
        '1' => ["brand" => "Mercedes-Benz", "model" => "E-Class", "year" => "1999", "price" => "12000"],
        '2' => ["brand" => "BMW", "model" => "M5", "year" => "2023", "price" => "4500"]
    ];

?>

<?php for ($i = 1; $i < 3; $i++) {
                             ?>

                    <div class="car_card">
                        <a href=car_page.php?id=<?php echo $i; ?>>
                            <div class="top_card">
                                <img src="resources/image_3.png" alt="картинка автомобиля на карточке">
                            </div>
                            <div class="desc_card">
                                <p><?php echo $cards[$i]['brand']; ?>
                                <?php echo " ".$cards[$i]['model']; ?>
                                </p>
                                <p><?php echo " ".$cards[$i]['year'];?></p>
                                <p><?php echo " ".$cards[$i]['price'];?> ₽</p>
                            </div>
                        </a>
                    </div>
                            
                            

                    <?php } ?>
<?php
$db_host = "localhost:3310";
$db_name = "prokat";
$db_user = "root";
$db_pass = "";

$db = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
function get_cards($class_id) {
    global $db;

        if($class_id == 0) {
            $q = $db->query("SELECT car.car_id, release_date, rent_price, car_model.car_model_name, 
                brand.brand_name, card_image.link_card_image, transmission.transmission_name
                FROM car 
                JOIN car_model ON car.car_model_id = car_model.car_model_id 
                JOIN brand ON brand.brand_id = car_model.brand_id 
                JOIN card_image ON card_image.card_image_id = car.card_image_id
                JOIN transmission ON car.transmission_id = transmission.transmission_id;");
        } else {
            $q = $db->query("SELECT car.car_id, release_date, rent_price, car_model.car_model_name, 
            brand.brand_name, card_image.link_card_image, transmission.transmission_name
            FROM car 
            JOIN car_model ON car.car_model_id = car_model.car_model_id 
            JOIN brand ON brand.brand_id = car_model.brand_id 
            JOIN card_image ON card_image.card_image_id = car.card_image_id
            JOIN transmission ON car.transmission_id = transmission.transmission_id
            WHERE car_model.car_class_id = $class_id;");
        }

    
        return $q->fetchAll(PDO::FETCH_ASSOC);
} ?>

<section class="main-content catalog-content">
    <div id="sidebar">
        <div id="list-car-class">
            <h2>Выбор авто:</h2>
            <div class="btn-classes">
                <form action="index.php" method="get">
                    <?php 
                        $class_arr = get_classes();
                        foreach ($class_arr as $val):
                    ?>
                        <button id='btn-class' type='submit' name='class' value="<?=$val["car_class_id"] ?>"><?=$val["car_class_name"] ?></button>
                    <?php endforeach ?>
                </form>
            </div>
        </div>

        <div id="search-panel">
            <form action="index.php" method="post">
                <h2>Поиск:</h2>
                <div class="search-panel-content">
                    <div class="brand-cell">
                        <p>Марка:</p>
                        <select name="brand">
                            <option value="0">Все</option>
                            <?php
                                $brands_arr = get_brands();
                                foreach ($brands_arr as $val): ?>
                                <option value="<?=$val["brand_id"] ?>"><?=$val["brand_name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="search-panel-year">
                        <p>Год:</p>
                        <select name="year">
                            <option value="0">Любой</option>
                            <?php 
                                $year = get_year();
                                foreach ($year as $val): 
                            ?>
                                <option value="<?=$val["release_date"] ?>"><?=$val["release_date"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button name="btn1" value="form1" type="submit" class="btn-accept">Поиск</button>
                </div>
            </form>
        </div>
    </div>

    <div class="grid-container catalog">
        <header class="catalog-header">
            <h1 class="header-page-name">Каталог автомобилей</h1>
            <h2 class="header-class-name" id="class-name">Все автомобили</h2>
        </header>

        <div class="grid-cars grid-cars-catalog" id="car-grid">
            <!-- Карточки автомобилей будут добавлены здесь с помощью JavaScript -->
        </div>

        <div class="next-prev-page" id="pagination">
            <!-- Кнопки пагинации будут добавлены здесь с помощью JavaScript -->
        </div>
    </div>
</section>
<script>
    const cars = <?php echo json_encode(get_cards(0)); ?>;

    const itemsPerPage = 2; // Количество автомобилей на странице
    let currentPage = 0;

    function displayCars() {
        const carGrid = document.getElementById('car-grid');
        carGrid.innerHTML = '';

        const start = currentPage * itemsPerPage;
        const end = start + itemsPerPage;
        const carsToDisplay = cars.slice(start, end);

        carsToDisplay.forEach(car => {
            const carCard = document.createElement('div');
            carCard.className = 'car_card car-card-catalog';
            carCard.innerHTML = `
                <a href="car_page.php?id=${car.rent_price}">
                    <div class="top_card top-card-catalog">
                        <img src="${car.link_card_image}" alt="картинка автомобиля на карточке">
                    </div>
                    <div class="desc_card-catalog">
                        <div class="card-price">
                            <p>${car.price}₽ в день</p>
                        </div>
                        <div class="card-properties">
                            <p>${car.brand_name} ${car.car_model_name}</p>
                            <p>${car.release_date}</p>
                            <p>Автомат</p> <!-- Вы можете заменить на данные о трансмиссии -->
                        </div>
                        <div class="card-btn">
                            <button class="btn-detailed">Подробнее</button>
                        </div>
                    </div>
                </a>
            `;
            carGrid.appendChild(carCard);
        });
    }

    function setupPagination() {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        const pageCount = Math.ceil(cars.length / itemsPerPage);

        // Кнопка "Назад"
        if (currentPage > 0) {
            const prevButton = document.createElement('a');
            prevButton.innerHTML = '<p><-Назад</p>';
            prevButton.href = '#';
            prevButton.onclick = () => {
                currentPage--;
                displayCars();
                setupPagination();
            };
            pagination.appendChild(prevButton);
        }

        // Кнопки страниц
        for (let i = 0; i < pageCount; i++) {
            const pageButton = document.createElement('a');
            pageButton.innerHTML = `<p>${i + 1}</p>`;
            pageButton.href = '#';
            pageButton.onclick = () => {
                currentPage = i;
                displayCars();
                setupPagination();
            };
            pagination.appendChild(pageButton);
        }

        // Кнопка "Далее"
        if (currentPage < pageCount - 1) {
            const nextButton = document.createElement('a');
            nextButton.innerHTML = '<p>Далее-></p>';
            nextButton.href = '#';
            nextButton.onclick = () => {
                currentPage++;
                displayCars();
                setupPagination();
            };
            pagination.appendChild(nextButton);
        }
    }

    function init() {
        displayCars();
        setupPagination();
    }

    window.onload = init;
</script>

<style>
    .next-prev-page {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .next-prev-page a {
        margin: 0 5px;
        text-decoration: none;
        color: blue;
    }
    .next-prev-page a p {
        margin: 0;
        padding: 5px;
        border: 1px solid lightgray;
        cursor: pointer;
    }
    .next-prev-page a:hover p {
        background-color: lightgray;
    }
</style>

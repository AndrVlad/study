

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
            <script>
            let offset = 0; 
            const limit = 2; 

            function loadMoreCars() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `loadmorecars.php?offset=${offset}`, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const cars = JSON.parse(xhr.responseText);
                        if (cars.length > 0) {
                            const gridCars = document.querySelector('.grid-cars');
                            cars.forEach(car => {
                                const carCard = `
                                    <div class="car_card">
                                        <a href="car_page.php?id=${car.car_id}">
                                            <div class="top_card">
                                                <img src="${car.link_card_image}" alt="картинка автомобиля на карточке">
                                            </div>
                                            <div class="desc_card">
                                                <p>${car.brand_name} ${car.car_model_name}</p>
                                                <p>${car.release_date}</p>
                                                <p>${car.rent_price}₽</p>
                                            </div>
                                        </a>
                                    </div>
                                `;
                                grid-cars.insertAdjacentHTML('beforeend', carCard);
                            });
                            offset += limit; // Увеличиваем значение смещения
                        }
                    }
                };
                xhr.send();
            }

            window.addEventListener('scroll', () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
        loadMoreCars();
    }
});

            loadMoreCars();
</script>
            <div class="grid-cars"></div>
                
            </div>

            <div class="more">
                <a href = "index.php?p=catalog">
                    <h2>Подробнее</h2>
                </a>
            </div>
</section> 
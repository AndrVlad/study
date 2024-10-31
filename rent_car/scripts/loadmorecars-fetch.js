let offset = 0; 
const limit = 2; 

async function loadMoreCars() {
    let url = `scripts/loadmorecars.php?offset=${offset}`;
    let response = await fetch(url);
    
        if (response.ok) {
            let cars = await response.json();
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
                    gridCars.insertAdjacentHTML('beforeend', carCard);
                });
                offset += limit; // Увеличиваем значение смещения
            }
        }
    };


window.addEventListener('scroll', () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
        loadMoreCars();
    }
});

loadMoreCars();
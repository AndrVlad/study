// Добавляем внешний скрипт для обратного отсчета времени скидки
function discountCountdown(endTime) {
    const endDate = new Date(endTime).getTime();

    const discountTimer = setInterval(() => {
        const now = new Date().getTime();
        const distance = endDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('discountCountdown').innerHTML = `
            <div>${days} дня</div>
            <div>${hours} часов</div>
            <div>${minutes} минут</div>
            <div>${seconds} секунд</div>
        `;

        if (distance < 0) {
            clearInterval(discountTimer);
            document.getElementById('discountCountdown').innerHTML = 'Скидка закончилась!';
        }
    }, 1000);
}


const discountEndDate = 'Jun 1, 2024 00:00:00';
discountCountdown(discountEndDate);


<section class="main-content">

            <div class="banner">
                <img src="resources/1.jpg" alt="картинка автопрокат в Орле">
            </div>

            <h1>Выбирают у нас:</h1>
            <div class="grid-container">
            <script src="scripts/loadmorecars.js"></script>
            <!-- <script src="scripts/loadmorecars-fetch.js"></script> -->
            <div class="grid-cars"></div>
                
            </div>

            <div class="more">
                <a href = "index.php?p=catalog">
                    <h2>Подробнее</h2>
                </a>
            </div>

<!-- Добавление контейнера чата -->
<div id="supportChat" style="border: 1px solid #ccc; padding: 10px; width: 300px; position: fixed; bottom: 10px; right: 10px; background-color: #f9f9f9;">
    <h3>Чат поддержки</h3>
    <div id="chatMessages" style="height: 150px; overflow-y: auto; border: 1px solid #ddd; margin-bottom: 10px; padding: 5px;"></div>
    <input type="text" id="chatInput" placeholder="Введите сообщение..." style="width: calc(100% - 22px);">
    <button onclick="sendMessage()" style="width: 100%; margin-top: 5px;">Отправить</button>
</div>

<script>
    // Подключение к WebSocket серверу
    const socket = new WebSocket('ws://localhost:8080');

    socket.onopen = function() {
        alert('WebSocket соединение установлено');
    };

    socket.onmessage = function(event) {
        const messageBox = document.getElementById('chatMessages');
        const newMessage = document.createElement('div');
        newMessage.textContent = `Служба поддержки: ${event.data}`;
        messageBox.appendChild(newMessage);
        messageBox.scrollTop = messageBox.scrollHeight; // Прокрутка вниз для новых сообщений
    };

    socket.onclose = function() {
        alert('WebSocket соединение закрыто');
    };

    socket.onerror = function(error) {
        alert('Ошибка WebSocket:', error);
    };

    function sendMessage() {
        const input = document.getElementById('chatInput');
        const message = input.value;
        if (message.trim() !== '') {
            socket.send(message);
            const messageBox = document.getElementById('chatMessages');
            const newMessage = document.createElement('div');
            newMessage.textContent = `Вы: ${message}`;
            newMessage.style.fontWeight = 'bold';
            messageBox.appendChild(newMessage);
            messageBox.scrollTop = messageBox.scrollHeight; // Прокрутка вниз для новых сообщений
            input.value = ''; // Очистка поля ввода
        }
    }
</script>


</section> 
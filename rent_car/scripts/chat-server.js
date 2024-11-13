const WebSocket = require('ws');
const wss = new WebSocket.Server({ port: 8080 });

wss.on('connection', ws => {
    ws.on('message', message => {
        console.log('Получено сообщение:', message);
        
        // Ответ клиенту
        ws.send(`Ваше сообщение: ${message}`);
    });

    ws.send('Добро пожаловать в чат поддержки!');
});
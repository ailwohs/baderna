const Discord = require('discord.js');
const client = new Discord.Client();
const prefix = '!';

client.on('ready', () => {
    console.log(`Bot está online como ${client.user.tag}`);
});

client.on('message', message => {
    if (!message.content.startsWith(prefix) || message.author.bot) return;

    const args = message.content.slice(prefix.length).trim().split(/ +/);
    const command = args.shift().toLowerCase();

    if (command === 'ping') {
        message.channel.send('Pong!');
    } else if (command === 'hello') {
        message.channel.send('Olá!');
    }
    // Adicione mais comandos conforme necessário

});

client.login('wV_JkrhFut_Ifv7ZZOrRBLW_');

// Mantém o bot ativo e reinicia automaticamente em caso de falha
function keepAlive() {
    setInterval(() => {
        if (!client.readyAt || Date.now() - client.readyAt > 600000) { // Reinicia se o bot não estiver pronto há mais de 10 minutos
            console.log('Reiniciando o bot...');
            client.destroy().then(() => client.login('wV_JkrhFut_Ifv7ZZOrRBLW_'));
        }
    }, 10000); // Verifica a cada 10 segundos se o bot está ativo
}

keepAlive();

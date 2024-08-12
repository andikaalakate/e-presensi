const { Client, LocalAuth } = require("whatsapp-web.js");
const qrcode = require("qrcode-terminal");

// Inisialisasi client WhatsApp
const client = new Client({
    authStrategy: new LocalAuth(),
    puppeteer: { headless: true }, // headless bisa diatur ke false jika ingin melihat browser
});

// Generate QR Code
client.on("qr", (qr) => {
    qrcode.generate(qr, { small: true });
});

// Menampilkan pesan ketika berhasil terhubung
client.on("ready", () => {
    console.log("Client is ready!");
});

// Start client
client.initialize();

// Fungsi untuk mengirim pesan
function sendMessage(number, message) {
    client
        .sendMessage(`${number}@c.us`, message)
        .then((response) => console.log("Message sent successfully"))
        .catch((err) => console.error("Error sending message:", err));
}

module.exports = { sendMessage };

// Mendapatkan elemen yang akan diperbarui
var greetingElement = document.getElementById("greeting");
var timeElement = document.getElementById("time");

// Fungsi untuk mendapatkan format waktu dengan leading zero
function formatTime(time) {
    return time < 10 ? "0" + time : time;
}

// Fungsi untuk mengupdate jam real-time
function updateTime() {
    var now = new Date();
    var hours = formatTime(now.getHours());
    var minutes = formatTime(now.getMinutes());
    var seconds = formatTime(now.getSeconds());
    timeElement.textContent = hours + ":" + minutes + ":" + seconds;
}

// Fungsi untuk menentukan ucapan selamat yang sesuai dengan waktu
function updateGreeting() {
    var currentTime = new Date().getHours();
    var greetingMsg;
    if (currentTime >= 5 && currentTime < 12) {
        greetingMsg = "Selamat Pagi!";
    } else if (currentTime >= 12 && currentTime < 17) {
        greetingMsg = "Selamat Siang!";
    } else if (currentTime >= 17 && currentTime < 20) {
        greetingMsg = "Selamat Sore!";
    } else {
        greetingMsg = "Selamat Malam!";
    }
    greetingElement.textContent = greetingMsg;
}

// Memanggil fungsi-fungsi update setiap detik
setInterval(updateTime, 1000);
setInterval(updateGreeting, 1000);

// Memanggil fungsi update saat halaman dimuat
updateTime();
updateGreeting();
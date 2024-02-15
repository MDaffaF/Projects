<?php
include '../connection/koneksi.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $reason = $_POST["alasan"];
    $username = $_POST["username"];

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO tb_cuti ( reason, username) VALUES ('$reason', '$username')";

    if ($koneksi->query($sql) === TRUE) {
        // Jika data berhasil dimasukkan ke database
        ?>
    <script>alert("Request izin berhasil ditambahkan!")
    window.location.href ="../view/cutipage.php"
    </script>
    <?php
    } else {
        // Jika terjadi kesalahan saat insert data ke database
        ?>
    <script>alert("Request izin gagal ditambahkan!")
    window.location.href ="../view/cutipage.php"
    </script>
    <?php
}
}

// Menutup koneksi
$koneksi->close();
?>
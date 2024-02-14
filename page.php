<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"]; // Peran pengguna, misalnya "karyawan" atau "admin"

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO tb_login (username, password, role) VALUES ('$username', '$password', '$role')";

    if ($koneksi->query($sql) === TRUE) {
        // Jika data berhasil dimasukkan ke database
        ?>
    <script>alert("User berhasil ditambahkan!")
    window.location.href ="loginpage.php"
    </script>
    <?php
    } else {
        // Jika terjadi kesalahan saat memasukkan data ke database
        ?>
    <script>alert("User gagal ditambahkan!")
    window.location.href ="pagependaftaran.php"
    </script>
    <?php
}
}

// Menutup koneksi
$koneksi->close();
?>
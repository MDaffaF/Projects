<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css"></head>
<body>
<?php
include '../connection/koneksi.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $reason = $_POST["alasan"];
    $username = $_POST["username"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO tb_izin ( reason, username, start_date, end_date) VALUES ('$reason', '$username', '$startDate', '$endDate')";

    if ($koneksi->query($sql) === TRUE) {
        // Jika data berhasil dimasukkan ke database
        ?>
    <script>Swal.fire({
  icon: "success",
  text: "Request izin berhasil ditambahkan!",
  showConfirmButton: false,
  timer: 1500
});</script>
  <script>
    setTimeout(function() {
            window.location.href = "../view/izinpage.php";
        }, 2000); // Redirect setelah 3 detik
    </script>
    <?php
    } else {
        // Jika terjadi kesalahan saat insert data ke database
        ?>
    <script>Swal.fire({
  icon: "error",
  text: "Request izin gagal ditambahkan!",
  showConfirmButton: false,
  timer: 1500
});</script>
  <script>
    setTimeout(function() {
            window.location.href = "../view/izinpage.php";
        }, 2000); // Redirect setelah 3 detik
    </script>
    <?php
}
}

// Menutup koneksi
$koneksi->close();
?>
</body>
</html>

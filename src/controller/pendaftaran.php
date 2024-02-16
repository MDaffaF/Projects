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
    <script>Swal.fire({
          title: "Apakah kamu yakin?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes"
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              title: "User berhasil Ditambahkan",
              icon: "success",
              showConfirmButton: false,
              timer: 3000   
            });
          }
        });</script>
        <script>
    setTimeout(function() {
            window.location.href = "../view/manageakun.php";
        }, 2000); // Redirect setelah 3 detik
    </script>
    <?php
    } else {
        // Jika terjadi kesalahan saat memasukkan data ke database
        ?>
    <script>alert("User gagal ditambahkan!")
    window.location.href ="../view/pagependaftaran.php"
    </script>
    <?php
}
}
  
// Menutup koneksi
$koneksi->close();
?>
</body>
</html>

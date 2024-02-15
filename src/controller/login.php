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
$username = $_POST['username'];
$password = $_POST['password'];
 
$query = mysqli_query($koneksi,"select * from tb_login where username='$username' and password='$password'");
$cek = mysqli_num_rows($query);
if ($cek > 0) {
    header("location: ../view/homepage.php");
    
    session_start();
    while ($dataUser = mysqli_fetch_array($query)) {
        $_SESSION['username'] = $dataUser['username'];
        $_SESSION['role'] = $dataUser['role'];
    }
    exit();
} else {
    ?>
    <script>Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "User tidak ditemukan, Harap hubungi admin!",
  showConfirmButton: false,
  timer: 1500
});</script>
  <script>
    setTimeout(function() {
            window.location.href = "../view/loginpage.php";
        }, 2000); // Redirect setelah 3 detik
    </script>
    <?php
}

?>
</body>
</html>

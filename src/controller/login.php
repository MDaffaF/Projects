<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css">
  </head>
<body>
<?php 
include '../connection/koneksi.php';
$username = $_POST['username'];
$password = $_POST["password"];
 
$query = mysqli_query($koneksi,"select * from tb_login where username='$username'");
$cek = mysqli_num_rows($query);
if ($cek > 0) {
  while ($user = mysqli_fetch_array($query) ) {
    if (password_verify($password, $user['password'])) {
        session_start();
        
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['image'] = $user['image'];
      ?>
        <script>Swal.fire({
          icon: "success",
          text: "Selamat Datang!",
          showConfirmButton: false,
          timer: 1500
        });
        setTimeout(function() {
                window.location.href = "../view/homepage.php";
            }, 2000); // Redirect setelah 3 detik
        </script>
        <?php
        exit();
    } else {
      ?>
        <script>
          Swal.fire({
            icon: "error",
            text: "Password atau username salah, Harap hubungi admin!",
            showConfirmButton: false,
            timer: 1500
          });
          setTimeout(function() {
                  window.location.href = "../view/loginpage.php";
              }, 2000); // Redirect setelah 3 detik
        </script>
      <?php
    }
  }
} else {
    ?>
    <script>Swal.fire({
  icon: "error",
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

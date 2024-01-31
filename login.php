<?php 
include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$query = mysqli_query($koneksi,"select * from tb_login where username='$username' and password='$password'");
$cek = mysqli_num_rows($query);
if ($cek > 0) {
    header("location: homepage.php");
    exit();
} else {
    ?>
    user tidak ditemukan.
    <br><a href="loginpage.php">Logout</a></br>
    <?php
}

?>
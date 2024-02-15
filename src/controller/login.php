<?php 
include '../connection/koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$query = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username='$username' and password='$password'");
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
    <script>alert("User Tidak Ditemukan, Harap Hubungi Admin!");
    window.location.href ="../view/loginpage.php"</script>
    <?php
}

?>
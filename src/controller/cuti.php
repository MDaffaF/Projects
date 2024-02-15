<?php 
include '../connection/koneksi.php';

$query = mysqli_query($koneksi,"select * from tb_cuti");
$cek = mysqli_num_rows($query);
if ($cek > 0) {
    header("location: ../view/homepage.php");
    exit();
} else {
    ?>
    <script>alert("User Tidak Ditemukan, Harap Hubungi Admin!");
    window.location.href ="../view/loginpage.php"</script>
    <?php
}

?>
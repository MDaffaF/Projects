<?php
$koneksi = mysqli_connect("localhost", "root", "agung");
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($koneksi, "login");
?>

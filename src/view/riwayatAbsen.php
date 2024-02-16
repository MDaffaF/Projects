<header>
    <?php include '../component/header.php';?>
</header>
<div class="container mt-5 w-75">
<?php
include '../connection/koneksi.php';
$username = $_SESSION['username'];
$query = "";
if ($_SESSION['role'] == 'admin') {
    $query = "SELECT * FROM tb_absen";
} else {
    $query = "SELECT * FROM tb_absen where username='$username'";
}
$result = mysqli_query($koneksi, $query);
$cek = mysqli_num_rows($result);
?>
    <div class="flex justify-between">
        <h1 class="font-bold text-3xl">Riwayat Absen</h1>
    </div>
    <table class="table table-striped mt-5 table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
            </tr>
            <tbody>
                <?php
                $index = 1;
                if ($cek == 0 ) {
                    echo "<td colspan='7' style='text-align:center;'>Data Tidak Ditemukan</td>";
                } else {
                    while($absen_data = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$index."</td>";
                        echo "<td>".$absen_data['username']."</td>";
                        echo "<td>".$absen_data['date']."</td>";
                        echo "<td>".$absen_data['check_in']."</td>";
                        echo "<td>".$absen_data['check_out']."</td>";
                    }
                }

                ?>
            </tbody>
        </thead>
    </table>
</div>
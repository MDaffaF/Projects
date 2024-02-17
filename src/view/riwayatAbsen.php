<title>Riwayat Absensi</title>
<link rel="icon" type="image/x-icon" href="../../assets/img/logo.png" />
<html>
    <head>
        <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8mWB-yOPJ1gxQsi7Eeqv_h9yHH8lzhWg&callback=initMap"></script>
    </head>
</html>
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
                    
                        echo "<tr data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-latitude='$absen_data[latitude]' data-bs-longitude='$absen_data[longitude]' style='cursor:pointer;'>";
                        echo "<td>".$index."</td>";
                        echo "<td>".$absen_data['username']."</td>";
                        echo "<td>".$absen_data['date']."</td>";
                        echo "<td>".$absen_data['check_in']."</td>";
                        echo "<td>".$absen_data['check_out']."</td>";
                        echo "<td id='latitude' hidden>".$absen_data['latitude']."</td>";
                        echo "<td id='latitude' hidden>".$absen_data['longitude']."</td>";
                    }
                }

                ?>
            </tbody>
        </thead>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Absen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="map" style="height: 400px; width: 100%;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/riwayatAbsen.js"></script>

</div>

<!-- Footer-->
<footer class="py-2 mt-5 bg-dark w-full fixed" style="bottom: 0;">
        <?php include '../component/footer.php'?>
    </footer>
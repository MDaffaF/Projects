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
        <!-- Button to export table to PDF -->
        <button onclick="exportToPDF()" class="btn btn-info">Export to PDF</button>
    </div>
    <div id="history">
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
                            $index++;
                        }
                    }
    
                    ?>
                </tbody>
            </thead>
        </table>
    </div>

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
                </div>
            </div>
        </div>
    </div>

    <script>
    function exportToPDF() {
        var sTable = document.getElementById('history').innerHTML;

        console.log(sTable);
        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Riwayat Absen</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>

    <script src="../../assets/js/riwayatAbsen.js"></script>

</div>

<!-- Footer-->
<footer class="py-2 mt-5 bg-dark w-full fixed" style="bottom: 0;">
        <?php include '../component/footer.php'?>
    </footer>
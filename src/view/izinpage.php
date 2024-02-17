<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png" />
    <title>Request izin</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php include '../component/header.php';?>
    </header>
    <div class="container mt-5 w-75">
    <?php
    include '../connection/koneksi.php';
    $username = $_SESSION['username'];
    $query = "";
    if ($_SESSION['role'] == 'admin') {
        $query = "SELECT * FROM tb_izin";
    } else {
        $query = "SELECT * FROM tb_izin where username='$username'";
    }
    $result = mysqli_query($koneksi, $query);
    $cek = mysqli_num_rows($result);
    ?>
        <div class="flex justify-between">
            <h1 class="font-bold text-3xl">Request izin</h1>
            <?php
            include '../component/createIzin.php';
                if ($_SESSION['role'] == 'user') {
                    ?>
                    <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createIzin">Buat Request</button>
                    <?php
                }
            ?>
        </div>
        <table class="table table-striped mt-5 table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Alasan</th>
                    <th>Mulai Tanggal</th>
                    <th>Sampai Tanggal</th>
                    <th>Persetujuan</th>
                    <!-- <th></th> -->
                </tr>
                <tbody>
                    <?php
                    $index = 1;
                    if ($cek == 0 ) {
                        echo "<td colspan='7' style='text-align:center;'>Data Tidak Ditemukan</td>";
                    } else {
                        while($izin_data = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>".$index."</td>";
                            echo "<td>".$izin_data['username']."</td>";
                            echo "<td>".$izin_data['reason']."</td>";
                            echo "<td>".$izin_data['start_date']."</td>";
                            echo "<td>".$izin_data['end_date']."</td>";
                            if ($izin_data['approval'] == null) {
                                echo "<td>Menunggu Approval</td>";
                            } else if ($izin_data['approval'] == 0) {
                                echo "<td>Ditolak</td>";
                            } else{
                                echo "<td>Diterima</td>";
                            }
                            if ($_SESSION['role'] == 'admin') {
                                if ($izin_data['approval'] == null) {
                                    echo "<td>
                                            <form method='post' action='../controller/izinController.php'>
                                                <input id='id_izin' name='id_izin' value='$izin_data[id_izin]' hidden>
                                                <button type='submit'  name='approve' class='btn btn-success bg-green-600'>Approve</button>
                                                <button type='submit'  name='reject' class='btn btn-success bg-green-600'>Reject</button>
                                        </form>
                                        </td>
                                    </tr>";
                                } else if($izin_data['approval']){
                                    echo "<td>
                                            <form method='post' action='../controller/izinController.php'>
                                                <input id='id_izin' name='id_izin' value='$izin_data[id_izin]' hidden>
                                                <button type='submit' name='reject' class='btn btn-success bg-green-600'>Reject</button>
                                            </form>
                                        </td>
                                    </tr>";
                                } else if(!$izin_data['approval']){
                                    echo "<td>
                                            <form method='post' action='../controller/izinController.php'>
                                                <input id='id_izin' name='id_izin' value='$izin_data[id_izin]' hidden>
                                                <button type='submit' name='approve' class='btn btn-success bg-green-600'>Approve</button>
                                            </form>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                if ($izin_data['approval']  == null) {
                                    echo "
                                    <td>
                                        <form method='post' action='../controller/izinController.php'>
                                            <input id='id_izin' name='id_izin' value='$izin_data[id_izin]' hidden>
                                            <button type='submit'  name='cancelIzin' class='btn btn-danger bg-red-600'>Cancel</button>
                                        </form>
                                    </td>
                                    </tr>";
                                }
                            }
                        }
                    }

                    ?>
                </tbody>
            </thead>
        </table>
    </div>
    <!-- Footer-->
    <footer class="py-2 mt-5 bg-dark w-full fixed" style="bottom: 0;">
        <?php include '../component/footer.php'?>
    </footer>
</body>
</html>

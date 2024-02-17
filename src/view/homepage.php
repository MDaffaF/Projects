<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="../../assets/css/home.css" rel="stylesheet" />
        
        <title>Home</title>
        <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        <?php include '../component/header.php'?>
    </header>
        <!-- Header-->
        <div class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <div class="img-circle-wrapper"></div>
                        <?php 
                        if (isset($_SESSION['image'])) {
                            # code...
                            echo "<img src='../../assets/img/$_SESSION[image]'  class='img-circle' style='margin: 0 auto;  width: 200px; height:200px;'>";
                        } else {
                            echo "<img src='../../assets/img/pp2.png' class='img-circle' style='margin: 0 auto; width: 200px; height:200px;'>";
                        }
                        ?>
                        <h1 id="greeting" class="display-5 fw-bold">Selamat Pagi!</h1>
                        <p id="time" class="font-bold text-3xl"></p>
                        <form action='../controller/absenController.php' method='post'>

                        <?php
                            include '../connection/koneksi.php';
                            $username = $_SESSION['username'];
                            $query = "";
                            $date = date('l, d-m-Y');

                            $query = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE username='$username' And date='$date'");
                            if (mysqli_num_rows($query) == 0) {
                                ?>
                                    <input type="text" value="" id="latitude" name="latitude" hidden>
                                    <input type="text" value="" id="longitude" name="longitude" hidden>
                                <?php
                                echo "<button type='submit' name='checkIn' class='btn btn-primary btn-lg bg-blue-600'>Absen Masuk</button>";
                            } else {
                                while($data_absen = mysqli_fetch_array($query)) {

                                    if ($data_absen['check_in'] != null && $data_absen['check_out'] != null ) {
                                        echo "<p class='text-2xl font-bold'>Selamat Beristirahat</p>";
                                    } else {

                                        echo "<button class='btn btn-primary btn-lg bg-blue-600' type='submit' name='checkOut'> Absen Pulang </button>";
                                    }
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Content-->
        <section class="pt-4">
            <div class="container px-lg-5">
                <!-- Page Features-->
                <div class="row gx-lg-5">
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <a href="../view/riwayatAbsen.php">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                    <i class="bi bi-clock-history"></i></div>
                                    <h2 class="fs-4 fw-bold text-black">Riwayat Absensi</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <a href="../view/izinpage.php">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                        <i class="bi bi-file-earmark-medical"></i></div>
                                    <h2 class="fs-4 fw-bold text-black">Pengajuan Izin dan Sakit</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <a href="../view/cutipage.php">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                        <i class="bi bi-calendar-week"></i>
                                    </div>
                                    <h2 class="fs-4 fw-bold text-black">Pengajuan Cuti</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    include '../component/createIzin.php';
                        if ($_SESSION['role'] == 'admin') {
                            ?>
                                <div class="col-lg-6 col-xxl-4 mb-5">
                                    <a href="../view/manageakun.php">
                                        <div class="card bg-light border-0 h-100">
                                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                                    <i class="bi bi-person-gear"></i>
                                                </div>
                                                <h2 class="fs-4 fw-bold text-black">Manage Akun</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                        }
                    ?>
                   
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-2 mt-5 bg-dark w-full relative" style="bottom: 0;">
            <?php include '../component/footer.php'?>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="../../assets/js/home.js"></script>

        <script src="../../assets/js/absen.js"></script>

</body>
</html>

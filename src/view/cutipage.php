<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Request izin</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php include '../component/header.php';?>
    </header>
    <div class="container mt-5">
    <?php
    include '../connection/koneksi.php';
    
    $result = mysqli_query($koneksi, "SELECT * FROM tb_izin");
    ?>
        <div class="flex justify-between">
            <h1 class="font-bold text-3xl">Request cuti</h1>
            <?php
            include '../component/createIzin.php';
                if ($_SESSION['role'] == 'user') {
                    ?>
                    <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createIzin">Buat Request</button>
                    <?php
                }
            ?>
        </div>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Reason</th>
                    <th>Approval</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    <?php
                    $index = 1;
                    while($izin_data = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$index."</td>";
                        echo "<td>".$izin_data['username']."</td>";
                        echo "<td>".$izin_data['reason']."</td>";
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
                                            <button type='submit'  name='approve' class='btn btn-info'>Approve</button>
                                            <button type='submit'  name='reject' class='btn btn-info'>Reject</button>
                                    </form>
                                    </td>
                                </tr>";
                            } else if($izin_data['approval']){
                                echo "<td>
                                        <form method='post' action='../controller/izinController.php'>
                                            <input id='id_izin' name='id_izin' value='$izin_data[id_izin]' hidden>
                                            <button type='submit'  name='reject' class='btn btn-info'>Reject</button>
                                        </form>
                                    </td>
                                </tr>";
                            } else if(!$izin_data['approval']){
                                echo "<td>
                                        <form method='post' action='../controller/izinController.php'>
                                            <input id='id_izin' name='id_izin' value='$izin_data[id_izin]' hidden>
                                            <button type='submit'  name='approve' class='btn btn-info'>Approve</button>
                                        </form>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "
                            <td>
                                <form method='post' action='../controller/izinController.php'>
                                    <input id='id_izin' name='id_izin' value='$izin_data[id_izin]' hidden>
                                    <button type='submit'  name='cancelIzin' class='btn btn-danger'>cancel</button>
                                </form>
                            </td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </thead>
        </table>
    </div>
</body>
</html>

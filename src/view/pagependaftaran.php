<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="loginpage.css">
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Form Pendaftaran</title>
</head>
<body>
<?php
            session_start();
            $username = $_SESSION['username'];
            if ($username == null) {
                ?>
                <script>
                    window.location.href="../view/loginpage.php"
                </script>
                <?php
            }
        ?>
<div class="container">
    <div class="row d-flex justify-content-center align-items-center m-0 text-center " style="height: 100vh;">
        <form action="../controller/pendaftaran.php" method="post" id="login" autocomplete="off" class="bg-light border p-3" enctype="multipart/form-data">
            <div class="form">
                <div class="col-12">
                <img src="../../assets/img/logo.png" alt="logo" id= "logo" width= 50px>
                    <h4 class="title">Form Pendaftaran Pegawai</h4>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input name="username" type="text" value="" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                            <div id="user_error"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input name="password" type="password" value="" class="input form-control" id="password" placeholder="Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                            <div id="password_error"></div>
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="password_show_hide();">
                                    <i class="fas fa-eye" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="file" name="foto" required="required">
                            <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="inputGroupSelect01" id="basic-addon1" name="role"><i class="fas fa-users"></i></span>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="role">
                                <option value="user">Karyawan</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" name="signin">Daftar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="loginpage.js"></script>
</body>
</html>
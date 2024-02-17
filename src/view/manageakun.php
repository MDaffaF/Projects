<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png" />
    <title>Manage Akun</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <?php include '../component/header.php';?>
    </header>
    <div class="container mt-5">
    <?php
    include '../connection/koneksi.php';
    $result = mysqli_query($koneksi, "SELECT * FROM tb_login");
    ?>
        <h1 class="font-bold text-3xl">Daftar User</h1>
        <a href="../view/pagependaftaran.php">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">
                Add User
                <!-- Add User -->
            </button>
        </a>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <?php
                $index = 1;
                    while($akun = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$index."</td>";
                        echo "<td>".$akun['username']."</td>";
                        echo "<td>".$akun['role']."</td>";
                        
                        echo "<td><img src='../../assets/img/$akun[image]' width='75' height='50'></td>";
                        echo "
                        <td>
                            <form method='post' action='../controller/Akuncontroller.php'>
                                <input id='username' name='username' value='$akun[username]' hidden>
                                <button type='submit'  name='delete' class='btn btn-danger'>Delete</button>
                            </form>
                        </td>
                        </tr>";
                    }?>
    <!-- Footer-->
    <footer class="py-2 mt-5 bg-dark w-full fixed" style="bottom: 0; left:0;">
        <?php include '../component/footer.php'?>
    </footer>
</body>
</html>
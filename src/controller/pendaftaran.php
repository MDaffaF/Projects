<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css"></head>
<body>
<?php
include '../connection/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $role = $_POST["role"]; // Peran pengguna, misalnya "karyawan" atau "admin"

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
    header("location: ../view/pagependaftaran.php?alert=gagal_ekstensi");
    } else{
        if($ukuran < 1044070){ 
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/img/'.$rand.'_'.$filename);
            // mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$kontak','$alamat','$xx')");
            // Query untuk memasukkan data ke database
            $sql = "INSERT INTO tb_login (username, password, role, image) VALUES ('$username', '$password', '$role', '$xx')";

            if ($koneksi->query($sql) === TRUE) {
                // Jika data berhasil dimasukkan ke database
                ?>
                <script>
                Swal.fire({
                    icon: "success",
                    text: "User berhasil ditambahkan!",
                    showConfirmButton: false,
                    timer: 1500
                });
                    setTimeout(function() {
                    window.location.href = "../view/manageakun.php";
                    }, 2000); // Redirect setelah 3 detik
                </script>
            <?php
            } else {
                // Jika terjadi kesalahan saat memasukkan data ke database
                ?>
                <script>
                    Swal.fire({
                        icon: "error",
                        text: "User gagal ditambahkan!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                        setTimeout(function() {
                        window.location.href = "../view/pagependaftaran.php";
                        }, 2000); // Redirect setelah 3 detik
                </script>
                <?php
            }
            header("location: ../view/manageakun.php?alert=berhasil");
        } else{
            header("location: ../view/pagependaftaran.php?alert=gagak_ukuran");
        }
    }

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO tb_login (username, password, role) VALUES ('$username', '$password', '$role')";

    if ($koneksi->query($sql) === TRUE) {
        // Jika data berhasil dimasukkan ke database
        ?>
        <script>
        Swal.fire({
            icon: "success",
            text: "User berhasil ditambahkan!",
            showConfirmButton: false,
            timer: 1500
        });
            setTimeout(function() {
            window.location.href = "../view/manageakun.php";
            }, 2000); // Redirect setelah 3 detik
        </script>
    <?php
    } else {
        // Jika terjadi kesalahan saat memasukkan data ke database
        ?>
    <script>alert("User gagal ditambahkan!")
    window.location.href ="../view/pagependaftaran.php"
    </script>
    <?php
}
}
  
// Menutup koneksi
$koneksi->close();
?>
</body>
</html>

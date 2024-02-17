<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css"></head>
</head>
<body>
<?php
session_start();

if(isset($_POST['delete'])){
    delete();
}
    
    function delete(){
        include '../connection/koneksi.php';
        $id = $_POST['username'];
    
        $result = mysqli_query($koneksi, "DELETE FROM tb_login WHERE username='$id'");
        
        if ($result) {
            $affected_rows = mysqli_affected_rows($koneksi);
    
            if ($affected_rows > 0) {
                ?>
                <script>
                Swal.fire({
                    icon: "success",
                    text: "User berhasil dihapus!",
                    showConfirmButton: false,
                    timer: 1500
                });
                    setTimeout(function() {
                    window.location.href = "../view/manageakun.php";
                    }, 2000); // Redirect setelah 3 detik
                </script>
                <?php
            } else {
                ?>
                <script>
                Swal.fire({
                    icon: "success",
                    text: "No records were deleted. No rows affected.",
                    showConfirmButton: false,
                    timer: 1500
                });
                    setTimeout(function() {
                    window.location.href = "../view/manageakun.php";
                    }, 2000); // Redirect setelah 3 detik
                </script>
                <?php
            }
        } else {
            echo "Error executing query: " . mysqli_error($koneksi);
        }
    
        header('../view/izinpage.php');
        mysqli_close($koneksi);
    }


?>
</body>
</html>
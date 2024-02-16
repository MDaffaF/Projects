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
session_start();

if(isset($_POST['cancelCuti'])){
    cancelCuti();
} else if(isset($_POST['approve'])){
    approve();
} else if(isset($_POST['reject'])){
    reject();
}

function cancelCuti(){

    include '../connection/koneksi.php';
    $id = $_POST['id_cuti'];

    $result = mysqli_query($koneksi, "DELETE FROM tb_cuti WHERE id_cuti='$id'");
    
    if ($result) {
        $affected_rows = mysqli_affected_rows($koneksi);

        if ($affected_rows > 0) {
            ?>
             <script>Swal.fire({
                icon: "success",
                text: "Request cuti berhasil dihapus!",
                showConfirmButton: false,
                timer: 1500
                });</script>
                <script>
            setTimeout(function() {
            window.location.href = "../view/cutipage.php";
            }, 2000); // Redirect setelah 3 detik
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('No records were deleted. No rows affected.')
                window.location.href = "../view/cutipage.php"
            </script>
            <?php
        }
    } else {
        echo "Error executing query: " . mysqli_error($koneksi);
    }

    header('../view/cutipage.php');
    mysqli_close($koneksi);
    
}

function approve(){
    include '../connection/koneksi.php';
    $id = $_POST['id_cuti'];

    $result = mysqli_query($koneksi, "UPDATE tb_cuti SET approval = true WHERE id_cuti=$id");
    
    if ($result) {
        $affected_rows = mysqli_affected_rows($koneksi);

        if ($affected_rows > 0) {
            ?>
            <script>Swal.fire({
                icon: "success",
                text: "Approved!",
                showConfirmButton: false,
                timer: 1500
                });</script>
                <script>
            setTimeout(function() {
            window.location.href = "../view/cutipage.php";
            }, 2000); // Redirect setelah 3 detik
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('No records were updated. No rows affected.')
                window.location.href = "../view/cutipage.php"
            </script>
            <?php
        }
    } else {
        echo "Error executing query: " . mysqli_error($koneksi);
    }

    header('../view/cutipage.php');
    mysqli_close($koneksi);
   }

   function reject(){
    include '../connection/koneksi.php';
    $id = $_POST['id_cuti'];

    $result = mysqli_query($koneksi, "UPDATE tb_cuti SET approval = false WHERE id_cuti=$id");
    
    if ($result) {
        $affected_rows = mysqli_affected_rows($koneksi);

        if ($affected_rows > 0) {
            ?>
            <script>Swal.fire({
                icon: "success",
                text: "Rejected!",
                showConfirmButton: false,
                timer: 1500
                });</script>
                <script>
            setTimeout(function() {
            window.location.href = "../view/cutipage.php";
            }, 2000); // Redirect setelah 3 detik
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('No records were updated. No rows affected.')
                window.location.href = "../view/cutipage.php"
            </script>
            <?php
        }
    } else {
        echo "Error executing query: " . mysqli_error($koneksi);
    }

    header('../view/cutipage.php');
    mysqli_close($koneksi);
   }
?>
</body>
</html>


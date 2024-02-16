
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css">
  </head>
<body>

<?php
session_start();

if(isset($_POST['checkIn'])){
    checkIn();
} else if(isset($_POST['checkOut'])){
    checkOut();
}

// // Retrieve the values from the POST data
// $value1 = $_POST['latitude'];
// $value2 = $_POST['longitude'];

// Example: Echo the values
// echo "Value 1awtatatwwtawtawtwa: $value1, Value 2: $value2";

function checkIn(){
    include '../connection/koneksi.php';
    // $id = $_POST['id_izin'];

    $username = $_SESSION['username'];
    $date = date('l, d-m-Y');
    $time = date('H:i:s a');
    $result = mysqli_query($koneksi, "INSERT INTO tb_absen (username, date, check_in, check_out) Values ('$username', '$date', '$time', '')");
    
    if ($result) {
        ?>
        <script>
           Swal.fire({
                    icon: "success",
                    text: "Anda Berhasil Check In!!",
                    showConfirmButton: false,
                    timer: 1500
            });
            setTimeout(function() {
                window.location.href = "../view/homepage.php";
            }, 2000);
        </script>
        <?php
        
    } else {
        echo "Error executing query: " . mysqli_error($koneksi);
    }

    header('../view/homepage.php');
    mysqli_close($koneksi);
}

function checkOut(){
    include '../connection/koneksi.php';
    $username = $_SESSION['username'];
    $date = date('l, d-m-Y');

    $getCheckIn = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE username='$username' And date='$date'");

    if ( mysqli_num_rows($getCheckIn) != 0 ) {

        $time = date('H:i:s a');
        $result = mysqli_query($koneksi, "UPDATE tb_absen SET check_out = '$time' WHERE date='$date' And username='$username'");
        
        if ($result) {
            ?>
            <script>
                Swal.fire({
                    icon: "success",
                    text: "Anda Berhasil Check Out!!",
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(function() {
                    window.location.href = "../view/homepage.php";
                }, 2000);
            </script>
            <?php
            
        } else {
            echo "Error executing query: " . mysqli_error($koneksi);
        }
    }


    header('../view/homepage.php');
    mysqli_close($koneksi);
}
?>

</body>
</html>
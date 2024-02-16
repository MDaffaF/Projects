

<?php
session_start();

if(isset($_POST['checkIn'])){
    checkIn();
} else if(isset($_POST['checkOut'])){
    checkOut();
}

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
            alert('Record inserted successfully.')
            window.location.href = "../view/homepage.php"
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
    // $id = $_POST['id_izin'];
    $date = date('l, d-m-Y');

    $getCheckIn = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE username='$username' And date='$date'");
    // $cek = mysqli_num_rows($query);

    if ( mysqli_num_rows($getCheckIn) != 0 ) {

        $time = date('H:i:s a');
        $result = mysqli_query($koneksi, "UPDATE tb_absen SET check_out = '$time' WHERE date='$date' And username='$username'");
        
        if ($result) {
            ?>
            <script>
                alert('Record inserted successfully.')
                window.location.href = "../view/homepage.php"
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
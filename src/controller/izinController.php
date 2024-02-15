

<?php
session_start();

if(isset($_POST['cancelIzin'])){
    cancelIzin();
} else if(isset($_POST['approve'])){
    approve();
} else if(isset($_POST['reject'])){
    reject();
}

function cancelIzin(){
    include '../connection/koneksi.php';
    $id = $_POST['id_izin'];

    $result = mysqli_query($koneksi, "DELETE FROM tb_izin WHERE id_izin=$id");
    
    if ($result) {
        $affected_rows = mysqli_affected_rows($koneksi);

        if ($affected_rows > 0) {
            ?>
            <script>
                alert('Record deleted successfully.')
                window.location.href = "../view/izinpage.php"
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('No records were deleted. No rows affected.')
                window.location.href = "../view/izinpage.php"
            </script>
            <?php
        }
    } else {
        echo "Error executing query: " . mysqli_error($koneksi);
    }

    header('../view/izinpage.php');
    mysqli_close($koneksi);
}

function approve(){
    include '../connection/koneksi.php';
    $id = $_POST['id_izin'];

    $result = mysqli_query($koneksi, "UPDATE tb_izin SET approval = true WHERE id_izin=$id");
    
    if ($result) {
        $affected_rows = mysqli_affected_rows($koneksi);

        if ($affected_rows > 0) {
            ?>
            <script>
                alert('Record updated successfully.')
                window.location.href = "../view/izinpage.php"
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('No records were updated. No rows affected.')
                window.location.href = "../view/izinpage.php"
            </script>
            <?php
        }
    } else {
        echo "Error executing query: " . mysqli_error($koneksi);
    }

    header('../view/izinpage.php');
    mysqli_close($koneksi);
   }

   function reject(){
    include '../connection/koneksi.php';
    $id = $_POST['id_izin'];

    $result = mysqli_query($koneksi, "UPDATE tb_izin SET approval = false WHERE id_izin=$id");
    
    if ($result) {
        $affected_rows = mysqli_affected_rows($koneksi);

        if ($affected_rows > 0) {
            ?>
            <script>
                alert('Record updated successfully.')
                window.location.href = "../view/izinpage.php"
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('No records were updated. No rows affected.')
                window.location.href = "../view/izinpage.php"
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
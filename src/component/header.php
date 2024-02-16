<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full h-16 bg-blue-500 flex justify-between items-center px-5">
        <a href="../view/homepage.php">    
            <img src="../../assets/img/logo.png" alt="logo" id= "logo" class="w-12 h-12">
        </a>
        <div class="">
            <?php
            session_start();
            
            $username = $_SESSION['username'];
            if ($username != null) {
                echo "<h1 class='text-black font-bold text-2xl'>Hello, $username</h1>";
            } else {
                header("Location: ../view/loginpage.php");
            }
            ?>
            <form method="post" action="">
                <input type="submit" name="logout_button" value="Logout" class="text-white">
            </form>
            <?php
            if (isset($_POST['logout_button'])) {
                $_SESSION = array();

                session_destroy();

                header("Location: ../view/loginpage.php");
                exit();
            }
            ?>
            <!-- <a href="./loginpage.php" class="text-white">Logout</a></br></p> -->
        </div>

    </div>
</body>
</html>

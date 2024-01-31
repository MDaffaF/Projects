<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<?php if (isset($_SESSION['username'])) : ?>
    <h3>Selamat Datang, Pak <?php echo $_SESSION['username']; ?></h3>
    <a href="logout.php">Logout</a>
<?php else : ?>
    <p>Anda belum login. Silakan <a href="loginpage.php">login</a>.</p>
<?php endif; ?>

</body>
</html>

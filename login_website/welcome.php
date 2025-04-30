<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang</title>
</head>
<body>
    <h1>Halo, <?php echo $_SESSION['username']; ?>! Selamat datang di website 🎉</h1>
    <a href="logout.php">Logout</a>
</body>
</html>

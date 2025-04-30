
<?php
$host = "localhost";
$user = "root"; // default username XAMPP
$pass = "";     // default kosong
$db   = "login_db"; // nama database

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<?php
session_start();
include 'database.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cek username
$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    // Verifikasi password
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
    } else {
        echo "<script>
                alert('Password salah!');
                window.location='login.html';
              </script>";
    }
} else {
    echo "<script>
            alert('Username tidak ditemukan!');
            window.location='login.html';
          </script>";
}
?>

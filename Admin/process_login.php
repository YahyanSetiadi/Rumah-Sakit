<?php
session_start();

// koneksi database
$conn = mysqli_connect("localhost","root","","zencare_hospital");

// periksa koneksi 
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


// Mengambil data dari form login
$userName = $_POST['userName'];
$password = $_POST['password'];

// Melakukan sanitasi input (hindari SQL injection)
$userName = mysqli_real_escape_string($conn, $userName);
$password = mysqli_real_escape_string($conn, $password);

// Mencari data pengguna di tabel data_akun
$query = "SELECT * FROM data_akun WHERE nama = '$userName' AND password = '$password'";
$result = $conn->query($query);

// Memeriksa apakah query berhasil dijalankan
if ($result->num_rows > 0) {
    // Login berhasil
    $_SESSION['userName'] = $userName;

    // Redirect ke halaman index.php
    header("Location: index.php");
    exit();
} else {
    // Login gagal
    echo "Login gagal. Silakan coba lagi.";
}

// Menutup koneksi
$conn->close();
?>

<?php
// Mulai session
session_start();

// Koneksi database 
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi pengguna baru ke database
    $query = "INSERT INTO data_akun (nama, email, password) VALUES ('$nama', '$email', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Simpan pesan sukses di session
        $_SESSION['success_message'] = "Account registration was successful!";
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        // Arahkan ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        $error = "Error menjalankan query: " . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
?>

<?php
// Mulai session
session_start();

// Koneksi database 
include("../db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nik = $_POST['NIK'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $diagnosis = $_POST['diagnosis'];
    $obat = $_POST['obat'];

    // Validasi pengguna baru ke database
    $query = "INSERT INTO record_pasien (NIK, nama_pasien, tanggal, diagnosis, obat) 
    VALUES ('$nik', '$nama', '$tanggal', '$diagnosis', '$obat')";
    $result = mysqli_query($conn, $query);

    

    if ($result) {
        // Simpan pesan sukses di sesi
        $_SESSION['success_message'] = "Data entered successfully!";

        // Arahkan ke halaman pilih_poli.php
        header("Location: index.php");
        exit();
    } else {
        $error = "Error menjalankan query: " . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
?>


?>

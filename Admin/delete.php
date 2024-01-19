<?php
// delete.php
$nik = $_GET['nik'];

    // koneksi database
    $conn = mysqli_connect("localhost","root","","zencare_hospital");

    // periksa koneksi 
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

$query = "DELETE FROM pasien WHERE NIK = '$nik'";
$result = $conn->query($query);

if ($result) {
    // Data berhasil dihapus, redirect ke halaman pasien.php dengan parameter success
    header("Location: pasien.php?success=delete");
    exit();
} else {
    echo "Gagal menghapus data.";
}

// tutup database
$conn->close();
?>

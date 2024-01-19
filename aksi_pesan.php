<?php
// Koneksi ke database
include 'db_connection.php';

// Ambil data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email'];
$no = $_POST['no'];
$pesan = $_POST['pesan'];

// Masukkan data ke dalam tabel pesan
$query = "INSERT INTO pesan (nama, email, no_hp, pesan) VALUES ('$nama', '$email', '$no', '$pesan')";

if ($conn->query($query) === TRUE) {
    // Data berhasil dimasukkan, tampilkan pemberitahuan
    echo '<script>alert("Pesan berhasil dikirim!");</script>';
    // Redirect kembali ke halaman index.php
    echo '<script>window.location.href = "index.php";</script>';
} else {
    echo "Gagal mengirim pesan: " . $conn->error;
}

// Tutup koneksi ke database
$conn->close();
?>

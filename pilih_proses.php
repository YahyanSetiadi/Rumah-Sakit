<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = isset($_POST['nik']) ? $_POST['nik'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $poli = isset($_POST['poli']) ? $_POST['poli'] : '';

    // Ambil data pasien dari tabel pasien berdasarkan NIK
    $sql = "SELECT * FROM pasien WHERE NIK = '$nik'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nama_pasien = $row['nama_pasien'];
            $email = $row['email'];
            $alamat = $row['alamat'];

            // Insert data ke dalam tabel register_pasien
            $insertSql = "INSERT INTO register_pasien (NIK, nama_pasien, email, alamat, tanggal, poli) 
                          VALUES ('$nik', '$nama_pasien', '$email', '$alamat', '$tanggal', '$poli')";

            if ($conn->query($insertSql) === TRUE) {
                echo "Data berhasil dimasukkan.";
            } else {
                echo "Error: " . $insertSql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Data pasien tidak ditemukan.";
    }
}

$conn->close();
?>


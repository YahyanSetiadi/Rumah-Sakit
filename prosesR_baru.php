<?php
// Mulai session
session_start();

// Koneksi database 
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    // Validasi pengguna baru ke database
    $query = "INSERT INTO pasien (NIK, nama_pasien, tanggal_lahir, jenis_kelamin, no_hp, email, alamat) 
    VALUES ('$nik', '$nama', '$date', '$gender', '$no_hp', '$email', '$alamat')";
    $result = mysqli_query($conn, $query);

    

    if ($result) {
        // Simpan data ke sesi
        $_SESSION['patient_data'] = array(
            'NIK' => $nik,
            'nama_pasien' => $nama,
            'email' => $email,
            'alamat' => $alamat
        );

        // Simpan pesan sukses di sesi
        $_SESSION['success_message'] = "Data entered successfully!";

        // Arahkan ke halaman pilih_poli.php
        header("Location: pilih_poli.php");
        exit();
    } else {
        $error = "Error menjalankan query: " . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
?>

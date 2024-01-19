<?php
// koneksi database
$conn = mysqli_connect("localhost","root","","zencare_hospital");

// periksa koneksi 
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>


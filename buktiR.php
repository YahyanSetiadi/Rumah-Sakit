<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/title.png">
    <title>Booking Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .confirmation-container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .confirmation-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .confirmation-details {
            margin-bottom: 20px;
        }

        .confirmation-details p {
            margin: 10px 0;
        }

        .confirmation-footer {
            text-align: center;
            margin-top: 20px;
        }

      .btn {

      }
    </style>
</head>
<body>
<?php
include 'db_connection.php';

// Query untuk mendapatkan data dari tabel register_pasien
$sql = "SELECT nama_pasien, email, alamat, tanggal, poli FROM register_pasien";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if ($result->num_rows > 0) {
    // Mendapatkan data satu per satu
    while($row = $result->fetch_assoc()) {
        $nama_pasien = $row["nama_pasien"];
        $email = $row["email"];
        $alamat = $row["alamat"];
        $tanggal = $row["tanggal"];
        $poli = $row["poli"];
    }
} else {
    echo "Tidak ada data ditemukan";
}

// Menutup koneksi
$conn->close();

// Template HTML
$html_template = '
    <div class="confirmation-container">
        <div class="confirmation-header">
            <h2>confirm reservation</h2>
        </div>

        <div class="confirmation-details">
            <p><strong>Name:</strong> %s</p>
            <p><strong>E-mail:</strong> %s</p>
            <p><strong>Address:</strong> %s</p>
            <p><strong>Reservation Date:</strong> %s</p>
            <p><strong>Service:</strong> %s</p>
            <p><strong>Dokter:</strong> Dr. Yahyan Setiadi</p>
        </div>

        <div class="confirmation-footer">
            <p>Thank you for choosing our service. Please show proof of this to the receptionist!</p>
        </div>
        <a href="index.php" type="button" class="btn btn-info">Close</a>
    </div>
';

// Menyisipkan data ke dalam template HTML
$html_output = sprintf(
    $html_template,
    $nama_pasien,
    $email,
    $alamat,
    $tanggal,
    $poli
);

// Menampilkan output HTML
echo $html_output;
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</body>
</html>

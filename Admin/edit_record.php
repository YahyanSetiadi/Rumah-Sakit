<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pasien</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            color: #00bca9;
            margin: 3rem 0 0 3rem
        }
        form {
            max-width: 600px;
            margin: auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .btn {
            background-color: #00bca9;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
// edit.php
$conn = mysqli_connect("localhost", "root", "", "zencare_hospital");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses formulir edit data pasien
    $nik = $_POST['nik'];
    $namaPasien = $_POST['nama_pasien'];
    $tanggal = $_POST['tanggal'];
    $diagnosis = $_POST['diagnosis'];
    $obat = $_POST['obat'];

    $updateQuery = "UPDATE record_pasien SET
                    nama_pasien = '$namaPasien',
                    tanggal = '$tanggal',
                    diagnosis = '$diagnosis',
                    obat = '$obat'
                    WHERE NIK = '$nik'";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: data_record.php?success=edit");
        exit();
    } else {
        echo "Gagal mengedit data: " . mysqli_error($conn);
    }
} else {
    // Ambil data pasien yang akan diedit
    $nik = $_GET['nik'];
    $query = "SELECT * FROM record_pasien WHERE NIK = '$nik'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Tampilkan formulir edit data pasien
    } else {
        echo "Data tidak ditemukan.";
    }
}

mysqli_close($conn);
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<h2>Update Medical Record</h2>
    <input type="hidden" name="nik" value="<?php echo $row['NIK']; ?>">

    <div class="form-group mt-2">
        <label for="nama_pasien">Nama Pasien:</label>
        <input type="text" class="form-control" name="nama_pasien" value="<?php echo $row['nama_pasien']; ?>">
    </div>

    <div class="form-group">
        <label for="tanggal">Tanggal:</label>
        <input type="date" class="form-control" name="tanggal" value="<?php echo $row['tanggal']; ?>">
    </div>

    <div class="form-group">
        <label for="diagnosis">Diagnosis:</label>
        <input type="text" class="form-control" name="diagnosis" value="<?php echo $row['diagnosis']; ?>">
    </div>

    <div class="form-group">
        <label for="obat">Obat:</label>
        <input type="text" class="form-control" name="obat" value="<?php echo $row['obat']; ?>">
    </div>

    <button type="submit" class="btn btn" style="background-color: #00bca9">Simpan Perubahan</button>
</form>


<!-- Bootstrap JS dan Popper.js (diperlukan untuk komponen Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

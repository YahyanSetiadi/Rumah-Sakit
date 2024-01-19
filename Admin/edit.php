<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pasien</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Data Pasien</h2>

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
    $tanggalLahir = $_POST['tanggal_lahir'];
    $jenisKelamin = $_POST['jenis_kelamin'];
    $noHp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $updateQuery = "UPDATE pasien SET
                    nama_pasien = '$namaPasien',
                    tanggal_lahir = '$tanggalLahir',
                    jenis_kelamin = '$jenisKelamin',
                    no_hp = '$noHp',
                    alamat = '$alamat'
                    WHERE NIK = '$nik'";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: pasien.php?success=edit");
        exit();
    } else {
        echo "Gagal mengedit data: " . mysqli_error($conn);
    }
} else {
    // Ambil data pasien yang akan diedit
    $nik = $_GET['nik'];
    $query = "SELECT * FROM pasien WHERE NIK = '$nik'";
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
        <input type="hidden" name="nik" value="<?php echo $row['NIK']; ?>">
        
        <div class="form-group">
            <label for="nama_pasien">Nama Pasien:</label>
            <input type="text" class="form-control" name="nama_pasien" value="<?php echo $row['nama_pasien']; ?>">
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select class="form-control" name="jenis_kelamin">
                <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="no_hp">Nomor HP:</label>
            <input type="tel" class="form-control" name="no_hp" value="<?php echo $row['no_hp']; ?>">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" name="alamat"><?php echo $row['alamat']; ?></textarea>
        </div>

        <button type="submit" class="btn btn" style="background-color: #00bca9">Simpan Perubahan</button>
    </form>
</div>

<!-- Bootstrap JS dan Popper.js (diperlukan untuk komponen Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Mulai session
session_start();

include 'db_connection.php';

// Periksa apakah data pasien sudah ada di sesi
if (isset($_SESSION['patient_data'])) {
    $patient_data = $_SESSION['patient_data'];

    // Gunakan nilai sesuai kebutuhan
    $NIK = $patient_data['NIK'];
    $nama_pasien = $patient_data['nama_pasien'];
    $email = $patient_data['email'];
    $alamat = $patient_data['alamat'];

    // input baru
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $poli = isset($_POST['poli']) ? $_POST['poli'] : '';

    // Validasi pengguna baru ke database
    $query = "INSERT INTO register_pasien (NIK, nama_pasien, email, alamat, tanggal, poli) 
    VALUES ('$NIK', '$nama_pasien', '$email', '$alamat', '$tanggal', '$poli')";
    $result = mysqli_query($conn, $query);

    // Hapus data dari sesi jika sudah tidak diperlukan
    // unset($_SESSION['patient_data']);
} else {
    // Redirect ke halaman sebelumnya atau lakukan sesuatu sesuai kebutuhan
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Choose a Polyclinic</title>
    <link rel="icon" href="assets/img/title.png" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <!-- my css -->
    <link rel="stylesheet" href="assets/CSS/poli.css" />
  </head>
  <body style="background-color: #eee">
    <section>
      <div class="card">
        <a href="index.php" class="btn-close" aria-label="Close" style="margin: 10px 0 0 525px"></a>
        <div class="card-body">
          <h3 class="card-title mt-2 text-center">Register <span style="color: #00cba9">Patient</span></h3>
          <form class="mx-1 mx-md-4" action="#" method="post">
            <!-- Tanggal -->
            <div class="mb-4">
              <div class="d-flex flex-row align-items-center">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input
                    type="text"
                    id="tanggal"
                    name="tanggal"
                    class="form-control"
                    placeholder="Reservation Date"
                    onfocus="(this.type='date')"
                    onblur="(this.type='text')"
                  />
                </div>
              </div>
            </div>

            <!-- Pilih Poli -->
            <div class="mb-4">
              <div class="d-flex flex-row align-items-center"> 
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <select name="poli" id="poli" class="form-control w-100 text-start">
                    <option value="0" class="text-start">Select Poly</option>
                    <option value="Cardiology Clinic">Cardiology Clinic (Poli Jantung)</option>
                    <option value="Otolaryngology Clinic">Otolaryngology Clinic (Poli THT)</option>
                    <option value="Ophthalmology Clinic">Ophthalmology Clinic (Poli Mata)</option>
                    <option value="Psychiatry Clinic">Psychiatry Clinic (Poli Psikiatri)</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- button  -->
            <div class="button-container">
              <!-- <a href="register_baru.php" type="button" class="btn" style="background-color: #00cba9">Back</a> -->
              <button type="submit" class="btn" style="background-color: #00cba9" onclick="myalert()">Register</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- alert -->
    <script>
        function myalert() {
            var confirmation = confirm("Click OK to display proof of reservation");

            if (confirmation) {
                // Open buktiR.php in a new window
                window.open("buktiR.php", "_blank");
            }

            // Prevent form submission
            return false;
        }
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

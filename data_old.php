<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/title.png">
    <title>Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/CSS/data_old.css" />
</head>
<body style="background-color: #eee">

<section>
    <div class="card" style="height: 33rem">
        <a href="index.php" class="btn-close" aria-label="Close" style="margin: 10px 0 0 525px"></a>
        <div class="card-body">
            <h3 class="card-title mt-1 text-center"><span class="tex fw-bold" style="color: #00bca0">ZenCare </span>Hospital</h3>
            <form class="mx-1 mx-md-4" id="searchForm" method="post">
                <div class="mb-1">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <p id="patientData">This is the data of registered patients at this hospital:</p>
                        </div>
                    </div>
                </div>
                <div class="mb-1">
                   <?php
        include 'db_connection.php';

        $nik = isset($_POST['nik']) ? $_POST['nik'] : '';
        $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
        $poli = isset($_POST['poli']) ? $_POST['poli'] : '';

        $sql = "SELECT * FROM pasien WHERE NIK = '$nik'";
        $result = $conn->query($sql);

        $dataPasien = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nik = $row['NIK'];
                $nama_pasien = $row['nama_pasien'];
                $email = $row['email'];
                $alamat = $row['alamat'];

                $dataPasien[] = array(
                    'NIK' => $nik,
                    'nama_pasien' => $nama_pasien,
                    'email' => $email,
                    'alamat' => $alamat,
                );

                echo "<div class='mb-4'>
                        <div class='d-flex flex-row align-items-center'>
                                    <i class='fas fa-envelope fa-lg me-3 fa-fw'></i>
                                    <div class='form-outline'>                                   
                                        <p class='label-text'> Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp" . $row['nama_pasien'] . "</p>
                                        <p class='label-text'> NIK &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp" . $row['NIK'] . "</p>
                                        <p class='label-text'> Date of Birth &nbsp&nbsp&nbsp&nbsp: &nbsp" . $row['tanggal_lahir'] . "</p>
                                        <p class='label-text'> Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp" . $row['jenis_kelamin'] . "</p>
                                        <p class='label-text'> Phone Number : &nbsp" . $row['no_hp'] . "</p>
                                        <p class='label-text'> E-mail &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp" . $row['email'] . "</p>
                                        <p class='label-text'> Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp" . $row['alamat'] . "</p>
                                    </div>
                                </div>
                            </div>";
                        }

                        foreach ($dataPasien as $pasien) {
                            $insertSql = "INSERT INTO register_pasien (NIK, nama_pasien, email, alamat, tanggal, poli) 
                                        VALUES ('$nik', '$nama_pasien', '$email', '$alamat' , '$tanggal', '$poli')";
                            if ($conn->query($insertSql) !== TRUE) {
                                echo "Error: " . $insertSql . "<br>" . $conn->error;
                            }
                            
                        }
                    } else {
                        echo "Data tidak ditemukan.";
                    }

            $conn->close();
            ?>

                </div>
                <div class="button-container">
    <a id="backBtn" href="register_lama.php" type="button" class="btn" style="background-color: #00cba9">Back</a>
    <a id="nextBtn" href="#" type="button" class="decryption btn" data-toggle="modal" data-target="#serviceUsModal1" style="background-color: #00cba9">Next</a>
</div>
            </form>
        </div>
    </div>
</div>
</section>

<div class="modal fade" id="serviceUsModal1" tabindex="-1" role="dialog" aria-labelledby="serviceUsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aboutUsModalLabel">Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="card-title mt-2 mb-4 text-center">Register <span style="color: #00cba9">Patient</span></h3>
                <form action="" method="post">
                    <div class="mb-4">
                        <div class="d-flex flex-row align-items-center">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input
                                    type="hidden" 
                                    id="nik"
                                    name="nik"
                                    value="<?php echo $nik; ?>"
                                />
                                <input
                                    type="date"
                                    id="tanggal"
                                    name="tanggal"
                                    class="form-control"
                                    placeholder="Reservation Date"
                                />
                            </div>
                        </div>
                    </div>

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

                    <div class="button-container">
                      <button type="submit" class="btn" style="background-color: #00cba9" onclick="myalert()">Register</button>
                      
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    feather.replace();
</script>
<script src="assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

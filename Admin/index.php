<?php
session_start();

// Memeriksa apakah user sudah login
if (!isset($_SESSION['userName'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />
    <style>
      #wrapper {
        background-color: #00bca9;
      }
    </style>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #00bca9;">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">ZenCare Hospital</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading">Interface</div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="pasien.php"
          >
            <i class="fas fa-fw fa-cog"></i>
            <span>Tabel Pasien</span>
          </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="inputRecord.php"
          >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Tabel Input Record</span>
          </a>
        </li>

    

        

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="data_record.php"
            
          >
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Record</span>
          </a>
          
        </li>
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="pesan.php"
            
          >
            <i class="fas fa-fw fa-folder"></i>
            <span>Massage</span>
          </a>
          
        </li>
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Tombol Logout -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form class="form-inline">
                        <button class="btn btn-danger" type="submit" formaction="logout.php">Logout</button>
                    </form>
                </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

        <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <!-- Patients -->
        <?php
        $conn = mysqli_connect("localhost", "root", "", "zencare_hospital");
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $query = "SELECT COUNT(*) as total_pasien FROM pasien";
        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            $total_pasien = $row['total_pasien'];

            echo '<div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Patients</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">' . $total_pasien . '</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();
        ?>

        <!-- Medical Records -->
        <?php
        $conn = mysqli_connect("localhost", "root", "", "zencare_hospital");
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $query = "SELECT COUNT(*) as total_pasien FROM record_pasien";
        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            $total_pasien = $row['total_pasien'];

            echo '<div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Medical Records</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">' . $total_pasien . '</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();
        ?>

        <!-- Massage -->
        <?php
        $conn = mysqli_connect("localhost", "root", "", "zencare_hospital");
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $query = "SELECT COUNT(*) as total_pasien FROM pesan";
        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            $total_pasien = $row['total_pasien'];

            echo '<div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Massage</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">' . $total_pasien . '</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
    </div>
</div>
<!-- End of Content Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
  </body>
</html>

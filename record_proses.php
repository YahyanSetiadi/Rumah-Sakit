<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Record</title>
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

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 12px;
            background-color: #00cba9;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve NIK from the form
    $nik = $_POST["nik"];

    // Perform a database query to fetch the record based on NIK
    $query = "SELECT NIK, nama_pasien, tanggal, diagnosis, obat FROM record_pasien WHERE NIK = ?";
    
    // Assuming you have a MySQLi connection named $conn
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nik);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a record is found
    if ($result->num_rows > 0) {
        // Display the record data in a larger card
        $row = $result->fetch_assoc();
        ?>
        <div class="confirmation-container">
        <div class="confirmation-header">
            <h2>Record <span style="color: #00cba9">Patient</span></h2>
        </div>
        <div class="confirmation-details">
            
            <p>NIK: <?php echo $row["NIK"]; ?></p>
            <p>Name: <?php echo $row["nama_pasien"]; ?></p>
            <p>Reversation Date: <?php echo $row["tanggal"]; ?></p>
            <p>Diagnosis: <?php echo $row["diagnosis"]; ?></p>
            <p>Medichine: <?php echo $row["obat"]; ?></p>
            </div>
            
            <div class="confirmation-footer">
            <p>This is the patient's medical record data</p>
        </div>
        <a href="index.php" class="back-button">Close</a>
    </div>
        <?php
    } else {
        echo "<p class='error'>No record found for NIK: $nik</p>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

</body>
</html>

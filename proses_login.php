<?php
// proses_login.php

session_start();

include 'db_connection.php';

function checkLogin($email, $password, $conn)
{
    // Ambil data dari database
    $query = "SELECT * FROM data_akun WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return true;
    }

    return false;
}

$email = isset($_POST['logemailS']) ? $_POST['logemailS'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (checkLogin($email, $password, $conn)) {
    $_SESSION['user_email'] = $email;
    header('Location: index.php');
    exit();
} else {
    header('Location: login.php');
    exit();
}
?>

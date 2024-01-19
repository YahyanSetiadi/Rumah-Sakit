<?php
session_start();

// Hancurkan sesi dan redirect ke halaman login
session_destroy();
header('Location: index.php');
exit();
?>

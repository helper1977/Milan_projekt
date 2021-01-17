<?php
    session_start();
    unset($_SESSION['up_ime']);
    unset($_SESSION['logiran']);
    setcookie("login-admin", "", time() - 3600);
    header("Location: /milan_projekt/prijava.php");
?>


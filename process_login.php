<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Username dan password hardcoded
    $valid_username = 'admin';
    $valid_password = 'admin';

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION['loggedin'] = true;
        header("Location: index_admin.php"); // Redirect ke halaman index_admin setelah login
        exit;
    } else {
        $login_error = "Username atau password salah!";
        header("Location: login.php?error=" . urlencode($login_error));
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>
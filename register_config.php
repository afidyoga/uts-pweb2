<?php
session_start();
require_once 'helper/connection.php';

if (isset($_POST['register'])) {
    $username = $_POST['reg_username'];
    $password = $_POST['reg_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password === $confirmPassword) {
        $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            header('Location: login.php');
            exit;
        } else {
            $_SESSION['info'] = [
                'status' => 'failed',
                'message' => 'Registrasi gagal. Silakan coba lagi.'
            ];
            header('Location: register.php');
            exit;
        }
    } else {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => 'Sandi tidak cocok. Silakan coba lagi.'
        ];
        header('Location: register.php');
        exit;
    }
}
?>
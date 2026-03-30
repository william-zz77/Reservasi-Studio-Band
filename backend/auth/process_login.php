<?php
session_start();
include '../../config/koneksi.php';

$username = strtolower(trim($_POST['username']));
$password = trim($_POST['password']);

$query = mysqli_query($conn, 
    "SELECT * FROM users WHERE LOWER(username)=LOWER('$username')"
);

$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['user'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    setcookie("user", $user['username'], time() + (86400 * 7), "/");

    header("Location: ../../index.html"); // atau index.php kalau kamu ubah
    exit;

} else {
    echo "Login gagal";
}
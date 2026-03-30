<?php
$conn = mysqli_connect("localhost", "root", "", "studio_dbbbs");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cuaca_db";

$conn = mysqli_connect($host, $user, $pass, $db);

// Tambahkan validasi koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

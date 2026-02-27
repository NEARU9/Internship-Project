<?php
include 'koneksi.php';

$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$suhu = $_POST['suhu'];
$kelembapan = $_POST['kelembapan'];
$tekanan = $_POST['tekanan'];
$kecepatan_angin = $_POST['kecepatan_angin'];
$arah_angin = $_POST['arah_angin'];
$curah_hujan = $_POST['curah_hujan'];
$kondisi = $_POST['kondisi'];

$sql = "INSERT INTO data_asli (tanggal, jam, suhu, kelembapan, tekanan, kecepatan_angin, arah_angin, curah_hujan, kondisi)
        VALUES ('$tanggal', '$jam', '$suhu', '$kelembapan', '$tekanan', '$kecepatan_angin', '$arah_angin', '$curah_hujan', '$kondisi')";

if ($conn->query($sql) === TRUE) {
    echo "sukses";
} else {
    echo "error: " . $conn->error;
}
?>

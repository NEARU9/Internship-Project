<?php
require 'koneksi.php';

// Ambil data asli (per jam)
$data_asli = [];
$q1 = mysqli_query($conn, "SELECT * FROM data_asli ORDER BY tanggal DESC, jam DESC");
while ($row = mysqli_fetch_assoc($q1)) {
    $data_asli[] = $row;
}

// Ambil data harian (agregat)
$data_harian = [];
$q2 = mysqli_query($conn, "
    SELECT 
        tanggal,
        ROUND(AVG(suhu), 2) AS rata_suhu,
        ROUND(AVG(kelembapan), 2) AS rata_kelembapan,
        ROUND(AVG(tekanan), 2) AS rata_tekanan,
        ROUND(AVG(kecepatan_angin), 2) AS rata_kecepatan_angin,
        ROUND(SUM(curah_hujan), 2) AS total_curah_hujan
    FROM data_asli
    GROUP BY tanggal
    ORDER BY tanggal DESC
");
while ($row = mysqli_fetch_assoc($q2)) {
    $data_harian[] = $row;
}

// Gabungkan dan kirim sebagai JSON
echo json_encode([
    'data_asli' => $data_asli,
    'data_harian' => $data_harian
]);
?>

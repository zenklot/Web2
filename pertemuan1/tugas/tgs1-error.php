<?php
$url = $_GET['error'];
$pesan = "Ada yang error!";
if($url == "nama"){
    $pesan = "<strong>Error! Field Nama,</strong><br>Nama tidak boleh diisi oleh angka!";
} elseif ($url =="jenis") {
    $pesan = "<strong>Error! Field Jenis Kelamin,</strong><br>Jenis Kelamin harus dipilih salah satu!";
} elseif ($url =="tgl") {
    $pesan = "<strong>Error! Field Tanggal Lahir,</strong><br>Tanggal Lahir harus diisi!";
}elseif ($url =="agama") {
    $pesan = "<strong>Error! Field Agama,</strong><br>Agama harus dipilih salah satu!";
}elseif ($url =="sekolah") {
    $pesan = "<strong>Error! Field Sekolah,</strong><br>Sekolah harus dipilih salah satu!";
}elseif ($url =="alamat") {
    $pesan = "<strong>Error! Field Alamat,</strong><br>Alamat tidak valid, lengkapi Alamat!";
}elseif ($url =="gbr1") {
    $pesan = "<strong>Error! Field Foto,</strong><br>Yang Anda Upload bukan file image!";
}elseif ($url =="gbr2") {
    $pesan = "<strong>Error! Field Foto,</strong><br>Foto yang anda Upload melebihi batas maximum file yang di upload!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kesalahan</title>
    <link rel="stylesheet" href="css/gaya.css">
</head>
<body>
<div class="wrap">
    <div class="header">
            <div class="logo">
            <img src="img/logo.png" alt="" width="100%">
            </div>
            <div class="judul">
            <h1>Daftar Member Zenklot PHP!</h1>
            </div>
        </div>
 <div class="kosong"></div>
 <br>
        <div class="container">
            <div class="pesanErr">
                <p class="err">
                <?= $pesan; ?>
                </p>
            </div>
            <hr>
            <br>
        <div class="kembali">
        <a href="tgs1-formDaftar.php" class="btnBack">Kembali</a>
        </div>
        <div class="kosong2"></div>
        </div>
</body>
</html>
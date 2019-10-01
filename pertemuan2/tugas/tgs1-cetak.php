<?php
// Inisialisasi 
$id = $_POST['id'];
$nama = ucwords(trim($_POST['nama']));
$namaD = explode(' ', $nama);
$namaD = $namaD[0];
$jk = $_POST['jk'];
$jenis = "Jenis Kelamin";
$tgl = $_POST['tgl'];
$agama = $_POST['agama'];
$sekolah = $_POST['sekolah'];
$alamat = htmlspecialchars(ucwords($_POST['alamat']));
$gambar = "def-L.png";
$dibuat = date('d M Y H:i:s');
// Inisialisasi Foto
$namaFoto = $_FILES['foto']['name'];
$ukuranFoto = $_FILES['foto']['size'];
$error = $_FILES['foto']['error'];
$tmpName = $_FILES['foto']['tmp_name'];

$ektensiBoleh = ['jpg','jpeg','png'];
$pecahNamaFoto = explode('.',$namaFoto);
$ektensiGambar = strtolower(end($pecahNamaFoto));
$namaFoto_Random = uniqid();
$namaFotoBaru = $namaFoto_Random. ".".$ektensiGambar;

// Pengecekan setiap inputan
// cek nama bukan numerik
if(is_numeric($nama)){
    echo "<script>
            alert('Gagal Edit Data! input nama harus huruf!');
            document.location.href= 'tgs1-formDaftar.php';
            </script>";
    die;
}

// cek jenis kelamin tidak di isi
if($jk == "-"){
    echo "<script>
    alert('Gagal Edit Data! Harus Pilih Jenis Kelamin!');
    document.location.href= 'tgs1-formDaftar.php';
    </script>";
    die;
}elseif ($jk == "L") {
    $jenis = "Laki-Laki";
}elseif ($jk == "P") {
    $jenis = "Perempuan";
}

// cek tgl lahir
if(empty($tgl)){
    echo "<script>
    alert('Gagal Edit Data! Tanggal Lahir harus diisi dengan benar!');
    document.location.href= 'tgs1-formDaftar.php';
    </script>";
    die;
}

// cek agama
if($agama == "-"){
    echo "<script>
            alert('Gagal Edit Data! pilih satu agama!');
            document.location.href= 'tgs1-formDaftar.php';
            </script>";
            die;
}

// cek pendidikan terakhir
if($sekolah == "-"){
    echo "<script>
    alert('Gagal Edit Data! Pilih pendidikan terakhir!');
    document.location.href= 'tgs1-formDaftar.php';
    </script>";
    die;
}

// cek alamat
$p_alamat = str_replace(' ','',trim($alamat));
$p_alamat = strlen($p_alamat);
if($p_alamat<=20){
    echo "<script>
    alert('Gagal Edit Data! Isikan alamat dengan benar, Desa, Kecamatan, RT/RW, Kota!');
    document.location.href= 'tgs1-formDaftar.php';
    </script>";
    die;
}

// cek upload gambar/tidak
if ($error === 4){
    // echo "<script>alert('Pilih gambar terlebih dahulu!')</script>";
    if ($jk == "L"){
        $gambar = "def-L.png";
        $jenis == "Laki-Laki";
    } elseif ($jk == "P") {
        $gambar = "def-P.png";
        $jenis = "Perempuan";
    }
} elseif ($error === 0) {
    $gambar = $namaFotoBaru;
    // cek yang di upload gambar
    if(!in_array($ektensiGambar,$ektensiBoleh)){
        echo "<script>
        alert('file yang di upload bukan Gambar!');
        document.location.href= 'tgs1-formDaftar.php';
    </script>";
    die;
    }
    if($ukuranFoto > 1000000){
        echo "<script>
        alert('ukuran file gambar terlalu besar!');
        document.location.href= 'tgs1-formDaftar.php';
    </script>";
    die;
    }
    move_uploaded_file($tmpName,'img/'.$gambar);
}
$tipe = 'r';
$namafile = "database.txt";
$filehandle = fopen($namafile, $tipe);
$ke = fread($filehandle, 10000);
$ke = substr($ke,-4);
$ke = explode(":",$ke);
$ke = end($ke);

if($ke == ''){
    $ke = 0;
}else {
    $ke++;
}
fclose($filehandle);

$tipe = 'a';
$filehandle = fopen($namafile, $tipe);
$datastring = "nma$ke:$nama"."jnk$ke:$jenis"."tgl$ke:$tgl"."agm$ke:$agama"."skl$ke:$sekolah"."alm$ke:$alamat"."gbr$ke:$gambar"."ids$ke:$id"."bwt$ke:$dibuat"."nom$ke:$ke";
fwrite($filehandle,$datastring);
fclose($filehandle);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kartu Member | Zenklot PHP</title>
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
            <div class="kartu">
            <div class="kartuHeader"></div>
            <div class="kartuHedJudul"><h3><strong>KARTU TANDA ANGGOTA<br>ZENKLOT PHP</strong></h3></div>
            <div class="kartuHedLogo"><img src="img/logo.png" width="100%" alt=""></div>
            <div class="pasFoto"><img src="img/<?= $gambar; ?>" width="100" alt=""></div>
            <div class="idid">
            <table cellpadding="0" cellspacing="0">
            <tr>
            <td width="10%">ID</td>
            <td>: <?= $id; ?>
            </td>
            </tr>
            </table>
            </div>
            <div class="lblLain">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td width="35%">Nama</td>
                    <td width="65%">: <?= $nama; ?></td>
                </tr>
                <tr>
                    <td>Jen. Kelamin</td>
                    <td>: <?= $jenis; ?></td>
                </tr>
                <tr>
                    <td>Tgl. Lahir</td>
                    <td>: <?= $tgl; ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: <?= $agama; ?></td>
                </tr>
                <tr>
                    <td>Pend. Terakhir</td>
                    <td>: <?= $sekolah; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= $alamat; ?></td>
                </tr>
            </table>
            </div>    
            <div class="kartuFooter"></div>
            <div class="kartuTgl">date : <?= date('d M Y'); ?></div>
            </div>
            <div class="kartu">
            <div class="footerKartuBack"></div>
            <div class="tulisanBack">
                <p>
                    ZENKLOT PHP<br> Adalah website khusus untuk belajar bahasa<br> pemrograman web yang sudah berbahasa indonesia.<br> Atau mencari pekerjaan ?, let's join us on <a href="http://zenklot-php.ga">http://zenklot-php.ga</a>
                </p>
                <p class="member">"<?= $namaD; ?> Is A Member."</p>
            </div>
            <div class="logoKartuBack"><img src="img/logo.png" width="100%" alt=""></div>
            <div class="tulisanBackFoot"><strong>ZENKLOT PHP | WEBSITE PEMROGRAMAN WEB</strong></div>
        <div class="tulisanTahun">
           Copyright @ <?= date('Y'); ?>
        </div>
        </div> 
        <div class="kosong"></div> 
        <hr>
        <br>
        <div class="kembali">
        <a href="tgs1-formDaftar.php" class="btnBack">Kembali</a>
        </div>    
        <div class="kosong2"></div>
    </div>  
        
    </div>
</body>
</html>

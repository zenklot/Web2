<?php

$namaFile = "database.txt";
$tipe = 'r';
$filehandle = fopen($namaFile, $tipe) or die("File Gagal Dibuka");

$data = fread($filehandle, 10000);
$no = substr($data,-4);
$no = explode(":",$no);
$no = end($no);
$no++;
for ($i=0;$i<$no;$i++){
    $nama1 = strpos($data,"nma$i:");
    $jnk1 = strpos($data,"jnk$i:");
    $tgl1 = strpos($data,"tgl$i:");
    $agm1 = strpos($data, "agm$i:");
    $skl1 = strpos($data,"skl$i:");
    $alm1 = strpos($data,"alm$i:");
    $gbr1 = strpos($data,"gbr$i:");
    $ids1 = strpos($data,"ids$i:");
    $bwt1 = strpos($data,"bwt$i:");
    $nom1 = strpos($data,"nom$i:");
    
    if($no>=1 and $no<10){
        $p = 5;
    } elseif ($no>=10 and $no<100) {
        $p = 6;
    } elseif ($no>100 and $no<1000) {
        $p = 7;
    }

    $nama[] = substr($data,$nama1+$p,$jnk1-($nama1+$p));
    $jnk[] = substr($data,$jnk1+$p,$tgl1-($jnk1+$p));
    $tgl[] = substr($data,$tgl1+$p,$agm1-($tgl1+$p));
    $agm[] = substr($data,$agm1+$p,$skl1-($agm1+$p));
    $skl[] = substr($data,$skl1+$p,$alm1-($skl1+$p));
    $alm[] = substr($data,$alm1+$p,$gbr1-($alm1+$p));
    $gbr[] = substr($data,$gbr1+$p,$ids1-($gbr1+$p));
    $ids[] = substr($data,$ids1+$p,$bwt1-($ids1+$p));
    $bwt[] = substr($data,$bwt1+$p,$nom1-($bwt1+$p));
}
fclose($filehandle);

if(isset($_POST['submit'])){
    $idm = $_POST['idm'];
    $idn = $_POST['id'];
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
    $namaFotoBaru = $_POST['nmFoto'];

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
        $gambar = $namaFotoBaru;
        $jenis == "Laki-Laki";
    } elseif ($jk == "P") {
        $gambar = $namaFotoBaru;
        $jenis = "Perempuan";
    }
    } elseif ($error === 0) {
        if($namaFotoBaru == "def-L.png" or $namaFotoBaru == "def-P.png"){
            $namaR = uniqid();
            $gambar = $namaR.".".$ektensiGambar;
        } else {
            $gambar = $namaFotoBaru;
        }
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


$namaFile = "database.txt";
$tipe = 'r';
$filehandle = fopen($namaFile, $tipe) or die("File Gagal Dibuka");
// var_dump($idm);
// die;
$data = fread($filehandle, 10000);

$no = substr($data,-4);
$no = explode(":",$no);
$no = end($no);
$no++;
for ($i=0;$i<$no;$i++){
        $nama1 = strpos($data,"nma$i:");
            $jnk1 = strpos($data,"jnk$i:");
                $tgl1 = strpos($data,"tgl$i:");
        $agm1 = strpos($data, "agm$i:");
            $skl1 = strpos($data,"skl$i:");
                $alm1 = strpos($data,"alm$i:");
            $gbr1 = strpos($data,"gbr$i:");
            $ids1 = strpos($data,"ids$i:");
            $bwt1 = strpos($data,"bwt$i:");
            $nom1 = strpos($data,"nom$i:");
            
            if($no>=1 and $no<10){             
        $p = 5;
    } elseif ($no>=10 and $no<100) {
        $p = 6;
    } elseif ($no>100 and $no<1000) {
        $p = 7;
    }

    $nam[] = substr($data,$nama1+$p,$jnk1-($nama1+$p));
    $jn[] = substr($data,$jnk1+$p,$tgl1-($jnk1+$p));
    $tg[] = substr($data,$tgl1+$p,$agm1-($tgl1+$p));
    $ag[] = substr($data,$agm1+$p,$skl1-($agm1+$p));
    $sk[] = substr($data,$skl1+$p,$alm1-($skl1+$p));
    $al[] = substr($data,$alm1+$p,$gbr1-($alm1+$p));
    $gb[] = substr($data,$gbr1+$p,$ids1-($gbr1+$p));
    $ide[] = substr($data,$ids1+$p,$bwt1-($ids1+$p));
    $bw[] = substr($data,$bwt1+$p,$nom1-($bwt1+$p));
}
fclose($filehandle);

$filehandle = fopen($namaFile, 'w') or die("file gagal dibuka");
$stringAwal = "nma$idm:$nam[$idm]"."jnk$idm:$jn[$idm]"."tgl$idm:$tg[$idm]"."agm$idm:$ag[$idm]"."skl$idm:$sk[$idm]"."alm$idm:$al[$idm]"."gbr$idm:$gb[$idm]"."ids$idm:$ide[$idm]"."bwt$idm:$bw[$idm]"."nom$idm:$idm";
$stringBaru = "nma$idm:$nama"."jnk$idm:$jenis"."tgl$idm:$tgl"."agm$idm:$agama"."skl$idm:$sekolah"."alm$idm:$alamat"."gbr$idm:$gambar"."ids$idm:$idn"."bwt$idm:$bw[$idm]"."nom$idm:$idm";
$datastring = str_replace($stringAwal,$stringBaru,$data);
fwrite($filehandle, $datastring);
fclose($filehandle);

echo "<script>
            alert('Data Berhasil Di Edit!');
            document.location.href= 'tgs1-formDaftar.php';
        </script>";
        die;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tugas 2 | Edit Pendaftaran</title>

    <link rel="stylesheet" href="css/gaya.css">
    
</head>
<body>
    <div class="wrap">
        <div class="header">
            <div class="logo">
            <img src="img/logo.png" alt="" width="100%">
            </div>
            <div class="judul">
            <h1>Edit Kartu Member Zenklot PHP!</h1>
            </div>
        </div>
 <div class="kosong"></div>
 <br>
    <div class="container">
                       
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idm" value="<?= $_GET['id']; ?>">
            <input type="hidden" name="nmFoto" value="<?= $gbr[$_GET['id']]; ?>">
            <table>
                <tr>
                    <td align="right"><label for="id">ID</label></td>
                    <td>: <input type="text" name="id" id="id" readonly value="<?= $ids[$_GET['id']]; ?>"></td>
                </tr>
                <tr>
                    <td align="right"><label for="nama">NAMA</label></td>
                    <td>: <input type="text" name="nama" id="nama" required autocomplete="off" maxlength="30" minlength="3" value="<?= $nama[$_GET['id']]; ?>"></td>
                </tr>
                <tr>
                    <td align="right"><label for="jk">JENIS KELAMIN</label></td>
                    <td>: <select name="jk" id="jk">
                        <option value="-">Pilih Jenis Kelamin</option>
                        <?php if($jnk[$_GET['id']]=='Laki-Laki'): ?>
                        <option value="L" selected>Laki-Laki</option>
                        <option value="P">Perempuan</option>
                        <?php elseif($jnk[$_GET['id']]=='Perempuan'): ?> 
                        <option value="L">Laki-Laki</option>
                        <option value="P" selected>Perempuan</option>
                        <?php endif; ?>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="tgl">TANGGAL LAHIR</label></td>
                    <td>: <input type="date" name="tgl" id="tgl" max="2001-12-31" min="1970-01-01" value="<?= $tgl[$_GET['id']]; ?>"></td>
                </tr>
                <tr>
                    <td align="right"><label for="agama">AGAMA</label></td>
                    <td>: <select name="agama" id="agama">
                        <option value="-">Pilih Agama</option>
                        <?php if($agm[$_GET['id']]=='ISLAM'): ?>
                        <option value="ISLAM" selected>ISLAM</option>
                        <option value="KRISTEN">KRISTEN</option>
                        <option value="BUDHA">BUDHA</option>
                        <option value="HINDU">HINDU</option>
                        <option value="KONG HU CHU">KONG HU CHU</option>
                        <?php elseif($jnk[$_GET['id']]=='KRISTEN'): ?> 
                        <option value="ISLAM" >ISLAM</option>
                        <option value="KRISTEN" selected>KRISTEN</option>
                        <option value="BUDHA">BUDHA</option>
                        <option value="HINDU">HINDU</option>
                        <option value="KONG HU CHU">KONG HU CHU</option>
                        <?php elseif($jnk[$_GET['id']]=='BUDHA'): ?> 
                        <option value="ISLAM" >ISLAM</option>
                        <option value="KRISTEN" >KRISTEN</option>
                        <option value="BUDHA" selected>BUDHA</option>
                        <option value="HINDU">HINDU</option>
                        <option value="KONG HU CHU">KONG HU CHU</option>
                        <?php elseif($jnk[$_GET['id']]=='HINDU'): ?> 
                        <option value="ISLAM" >ISLAM</option>
                        <option value="KRISTEN" >KRISTEN</option>
                        <option value="BUDHA">BUDHA</option>
                        <option value="HINDU" selected>HINDU</option>
                        <option value="KONG HU CHU">KONG HU CHU</option>
                        <?php elseif($jnk[$_GET['id']]=='KONG HU CHU'): ?> 
                        <option value="ISLAM" >ISLAM</option>
                        <option value="KRISTEN" >KRISTEN</option>
                        <option value="BUDHA">BUDHA</option>
                        <option value="HINDU">HINDU</option>
                        <option value="KONG HU CHU" selected>KONG HU CHU</option>
                        <?php endif; ?>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="sekolah">PENDIDIKAN TERAKHIR</label></td>
                    <td>: <select name="sekolah" id="sekolah">
                        <option value="-">Pilih Pendidikan Terakhir</option>
                        <?php if($skl[$_GET['id']]=='SD'): ?>
                        <option value="SD" selected>SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <?php elseif($skl[$_GET['id']]=='SMP'): ?> 
                        <option value="SD" >SD</option>
                        <option value="SMP" selected>SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <?php elseif($skl[$_GET['id']]=='SMA'): ?> 
                        <option value="SD" >SD</option>
                        <option value="SMP" >SMP</option>
                        <option value="SMA" selected>SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <?php elseif($skl[$_GET['id']]=='D3'): ?> 
                        <option value="SD" >SD</option>
                        <option value="SMP" >SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3" selected>D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <?php elseif($skl[$_GET['id']]=='S1'): ?> 
                        <option value="SD" >SD</option>
                        <option value="SMP" >SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1" selected>S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <?php elseif($skl[$_GET['id']]=='S2'): ?> 
                        <option value="SD" >SD</option>
                        <option value="SMP" >SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2" selected>S2</option>
                        <option value="S3">S3</option>
                        <?php elseif($skl[$_GET['id']]=='S3'): ?> 
                        <option value="SD" >SD</option>
                        <option value="SMP" >SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3" selected>S3</option>
                        <?php endif; ?>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="alamat">ALAMAT</label></td>
                    <td>: <textarea name="alamat" id="alamat" cols="20" rows="5"><?= $alm[$_GET['id']]; ?></textarea></td>
                </tr>
                <tr>
                    <td align="right"><label for="foto">GANTI FOTO</label></td>
                    <td>: <input type="file" name="foto" id="foto" accept="image/*"></td>
                </tr>
                <tr>
                    <td align="right"><label for="">FOTO SEKARANG</label></td>
                    <td>: <img src="img/<?= $gbr[$_GET['id']]; ?>" alt="" width="100px"></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><button type="submit" name="submit">EDIT!</button></td>
                </tr>
            </table>
            
</form>
<br>
<br>
<div class="kembali">
        <a href="tgs1-formDaftar.php" class="btnBack">Kembali</a>
        </div> 
        <br>
        <br>   
    </div>
    </div>
</body>
</html>

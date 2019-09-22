<?php
$id = $_GET['id'];
if(isset($_POST['yakin'])){
    
$idm = $_POST['idm'];
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
$datastring = str_replace($stringAwal,"",$data);
fwrite($filehandle, $datastring);
fclose($filehandle);

if($gb[$idm] == "def-L.png" or $gb[$idm] == "def-P.png"){
} else {
    unlink("img/".$gb[$idm]);
}

echo "<script>
            alert('Data Berhasil Di Hapus!');
            document.location.href= 'tgs1-formDaftar.php';
            </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hapus Member | Zenklot PHP</title>
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
 <form action="" method="post">
 <input type="hidden" name="idm" value="<?= $id; ?>">
    <label for="">Yakin Hapus ?</label>
    <button type="submit" name="yakin">Yakin</button>
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
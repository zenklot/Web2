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
            <div class="pasFoto"><img src="img/<?= $gbr[$_GET['id']]; ?>" width="100" alt=""></div>
            <div class="idid">
            <table cellpadding="0" cellspacing="0">
            <tr>
            <td width="10%">ID</td>
            <td>: <?= $ids[$_GET['id']];?>
            </td>
            </tr>
            </table>
            </div>
            <div class="lblLain">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td width="35%">Nama</td>
                    <td width="65%">: <?= $nama[$_GET['id']]; ?></td>
                </tr>
                <tr>
                    <td>Jen. Kelamin</td>
                    <td>: <?= $jnk[$_GET['id']]; ?></td>
                </tr>
                <tr>
                    <td>Tgl. Lahir</td>
                    <td>: <?= $tgl[$_GET['id']]; ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: <?= $agm[$_GET['id']]; ?></td>
                </tr>
                <tr>
                    <td>Pend. Terakhir</td>
                    <td>: <?= $skl[$_GET['id']]; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= $alm[$_GET['id']]; ?></td>
                </tr>
            </table>
            </div>    
            <div class="kartuFooter"></div>
            <div class="kartuTgl">date : <?php echo (substr($bwt[$_GET['id']],0,11)); ?></div>
            </div>
            <div class="kartu">
            <div class="footerKartuBack"></div>
            <div class="tulisanBack">
                <p>
                    ZENKLOT PHP<br> Adalah website khusus untuk belajar bahasa<br> pemrograman web yang sudah berbahasa indonesia.<br> Atau mencari pekerjaan ?, let's join us on <a href="http://zenklot-php.ga">http://zenklot-php.ga</a>
                </p>
                <p class="member">"<?php $ngaran = explode(' ',$nama[$_GET['id']]); echo $ngaran[0];?> Is A Member."</p>
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

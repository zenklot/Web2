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
    $alm[] = substr($data,$alm1+$p,$gbr1-($alm1+$p));
    $gbr[] = substr($data,$gbr1+$p,$ids1-($gbr1+$p));
    $ids[] = substr($data,$ids1+$p,$bwt1-($ids1+$p));
    $bwt[] = substr($data,$bwt1+$p,$nom1-($bwt1+$p));
    $ak = $no - ($no-1);
    if($ak < 0){
        $ak= 1;
    }else{
        if ($i == $ak){
            $akng = $no - 1;
        }
    }
}
fclose($filehandle);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tugas 1 | Form Pendaftaran</title>

    <link rel="stylesheet" href="css/gaya.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.10.18/css/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="DataTables/Buttons-1.5.6/css/buttons.dataTables.css"/>
<script type="text/javascript" src="DataTables/pdfmake-0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="DataTables/DataTables-1.10.18/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.5.6/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.5.6/js/buttons.html5.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.5.6/js/buttons.print.js"></script>

    <script>
    $(document).ready(function() {
    $('#tabel').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'pdf', 'print'
        ]
    } );
} );
    </script>
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

            <form action="tgs1-cetak.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td align="right"><label for="id">ID</label></td>
                    <td>: <input type="text" name="id" id="id" readonly value="<?= $ids[$akng] + 1; ?>"></td>
                </tr>
                <tr>
                    <td align="right"><label for="nama">NAMA</label></td>
                    <td>: <input type="text" name="nama" id="nama" required autocomplete="off" maxlength="30" minlength="3"></td>
                </tr>
                <tr>
                    <td align="right"><label for="jk">JENIS KELAMIN</label></td>
                    <td>: <select name="jk" id="jk">
                        <option value="-">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="tgl">TANGGAL LAHIR</label></td>
                    <td>: <input type="date" name="tgl" id="tgl" max="2001-12-31" min="1970-01-01"></td>
                </tr>
                <tr>
                    <td align="right"><label for="agama">AGAMA</label></td>
                    <td>: <select name="agama" id="agama">
                        <option value="-">Pilih Agama</option>
                        <option value="ISLAM">ISLAM</option>
                        <option value="KRISTEN">KRISTEN</option>
                        <option value="BUDHA">BUDHA</option>
                        <option value="HINDU">HINDU</option>
                        <option value="KONG HU CHU">KONG HU CHU</option>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="sekolah">PENDIDIKAN TERAKHIR</label></td>
                    <td>: <select name="sekolah" id="sekolah">
                        <option value="-">Pilih Pendidikan Terakhir</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="alamat">ALAMAT</label></td>
                    <td>: <textarea name="alamat" id="alamat" cols="20" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td align="right"><label for="foto">FOTO</label></td>
                    <td>: <input type="file" name="foto" id="foto" accept="image/*"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Tambah!</button></td>
                </tr>
            </table>
            
</form>
<br>
<br>
<hr>
<br>
<br>
<h1 align="center">Riwayat Pendaftar</h1>
    <table id="tabel" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        
          <?php
          $angs = 0;
            for ($i=0; $i < $no; $i++) { 
                if(strlen($nama[$i])>40){
                }elseif (strlen($nama[$i]) == '') {
                }else{
                    $angs++;
                    echo "<tr align='center'>
                            <td>$angs</td>
                            <td>$nama[$i]</td>
                            <td>$jnk[$i]</td>
                            <td>$bwt[$i]</td>
                            <td><a href='tgs2-detail.php?id=$i' class='btnDet primar'>detail</a> | <a href='tgs2-edit.php?id=$i'class='btnDet suces'>edit</a> | <a href='tgs2-hapus.php?id=$i' class='btnDet dgr'>hapus</a></td>
                        </tr>";
                }
            }
          ?>
        </tbody>
        </table>
    </div>
    </div>
</body>
</html>

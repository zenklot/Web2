<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tugas 1 | Form Pendaftaran</title>
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
                       
            <form action="tgs1-cetak.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td align="right"><label for="id">ID</label></td>
                    <td>: <input type="text" name="id" id="id" readonly value="<?= date("ymd") . 0 + 1; ?>"></td>
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
                    <td><button type="submit">KIRIM!</button></td>
                </tr>
            </table>
            
</form>
    </div>
    </div>
</body>
</html>

<?php 
		// Contoh Fungsi tanpa Parameter
		function selamat()
		{
			echo "Selamat Belajar PHP";
		}

		// contoh fungsi dengan Parameter
		function apakabar($nama="Gozenx",$kota="Ciamis")
		{
			echo "Apa Kabar $nama yang berasal dari $kota";
		}

		// Contoh Fungsi pembembalian nilai
		function jumlahkan($bil1,$bil2)
		{
			$hasil = $bil1+$bil2;
			return $hasil;
		}

		// contoh fungsi Tanggal
		// menggunakan : date();

		// tentukan terlebih dahulu time zone yang akan di tampilkan
		date_default_timezone_set("asia/jakarta");

		// Membuat tanggal sendiri
		// Menampilkan tanggal besok
		$besok = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
		$kemarin = mktime(0,0,0,date("m"),date("d")-1,date("Y"));



?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Latihan 1 | Belajar Fungsi PHP</title>
  </head>
  <body>

<div class="container">
	<div class="row">
		<div class="col-6">

<div class="card mt-3">
  <div class="card-header">
    Belajar Fungsi Dasar
  </div>
  <div class="card-body">
    <h5 class="card-title">Contoh Penggunaan Fungsi</h5>
    <hr>
    <ul>
    	<li><p class="card-text"><?= selamat() ?></p></li>
    	<li><p class="card-text"><?= apakabar("Dede S","Ciamis"); ?></p></li>
    	<li><p class="card-text"><?= jumlahkan(2,3) ?></p></li>
    </ul>
    
  
  
    
  </div>
</div>

			
		</div>

		<div class="col-6">
			
			<div class="card mt-3">
  <div class="card-header">
    Belajar Fungsi Date
  </div>
  <div class="card-body">
    <h5 class="card-title">Contoh Penggunaan Fungsi Tanggal</h5>
    <hr>
    <ul>
    	<li><p class="card-text">Tanggal Sekarang : <?= date("d/m/Y") ?></p></li>
    	<li><p class="card-text">Waktu Sekarang : <?= date("h:i:s") ?></p></li>
    </ul>
    <hr>
    <h5 class="card-title">Contoh Penggunaan Fungsi Buat Tanggal Sendiri</h5>
    <hr>

    <ul>
    	<li><p class="card-text">Tanggal Besok : <?= date("d/m/Y", $besok) ?></p></li>
    	<li><p class="card-text">Tanggal Kemarin : <?= date("d/m/Y", $kemarin) ?></p></li>
    </ul>
    
  </div>
</div>

		</div>
	</div>

</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

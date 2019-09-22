<?php
/* Fungsi Cetak Pada PHP
	- print
	- echo
	- var_dump() : digunakan untuk menampilkan debug
	
	Fungsi Aritmatika
	- * : kali
	- - : kurangi
	- + : tambah
	- / : bagi
	- % : sisa hasil bagi
*/


//var_dump ("Hello World!");
$zez = "Zenklot";



?>

<html>
	<head>
		<title>Latihan PHP 1</title>
		<style>
			.kodingPhp{
				margin : auto;
				padding : 5px;
				width : 700px;
				border:1px solid black;
				background:#eee;
			}
		</style>
	</head>
	<body>
	<!-- Contoh Embeded Script : -->
	<h1>Hello, <?= $zez; ?>!</h1>
	<?php 
	
		echo "<h3>Nama Saya : $zez </h3>";
	?>
	<!-- akhir embed script : -->
	<hr>
	<strong>Fungsi Cetak Pada PHP</strong>
	<ul>
		<li>print</li>
		<li>echo</li>
		<li>var_dump() : digunakan untuk menampilkan debug</li>
	</ul>
	<br>
	
	<strong>Fungsi Aritmatika</strong>
	<ul>
		<li>* : kali</li>
		<li>- : kurangi</li>
		<li>+ : tambah</li>
		<li>/ : bagi</li>
		<li>% : sisa hasil bagi</li>
		
	</ul>
	<div class="kodingPhp">
	<?php
		$nama = "Zenklot";
		echo '<h2 align="center">Belajar PHP Itu Mudah</h2> ';
		echo "<h3>Nama Saya : $nama </h3>";
		
		// Fungsi Aritmatika
		$b1 = 2;
		$b2 = 3;
		$hKali = $b1 * $b2;
		$hTmbh = $b1 + $b2;
		$hKrng = $b1 - $b2;
		$hBgi = $b1 / $b2;
		$hSisa = $b1 % $b2;
		
		// tampilkan fungsinya
		echo "Bilangan 1 : $b1 <br>";
		echo "Bilangan 2 : $b2 <br>";
		echo "Bilangan 1 dikali Bilangan 2 : $b1 * $b2 = $hKali <br>";
		echo "Bilangan 1 ditambah Bilangan 2 : $b1 + $b2 = $hTmbh <br>";
		echo "Bilangan 1 dikurang Bilangan 2 : $b1 - $b2 = $hKrng <br>";
		echo "Bilangan 1 dibagi Bilangan 2 : $b1 / $b2 = $hBgi <br>";
		echo "Bilangan 1 Sisa Hasil Bagi Bilangan 2 : $b1 % $b2 = $hSisa <br>";
		
		echo "<br>";
		// Fungsi Percabangan
		
		$nilai = 55;
		
			if($nilai>=75) {
				echo "<h3>Nilai Anda : $nilai, Anda Lulus</h3>"; 
			}else{
				echo "<h3>Nilai Anda : $nilai, Anda Tidak Lulus</h3>"; 
			}
			
			if($nilai>=85 and $nilai<=100){
				echo "<h3>Grade : A</h3>";
			} else If($nilai>=75 and $nilai<=84){
				echo "<h3>Grade : B</h3>";
			} else If($nilai>=65 and $nilai<=74){
				echo "<h3>Grade : C</h3>";
			} else If($nilai>=55 and $nilai<=64){
				echo "<h3>Grade : D</h3>";
			} else {
				echo "<h3>Grade : E</h3>";
				}
				
				// Pengulangan
				for($i=1;$i<=11;$i++){
					echo "Ini Pengulangan Ke : $i <br>";
				}
	?>
	</div>
	</body>
</html>
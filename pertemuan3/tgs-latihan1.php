<?php 

// Fungsi Terbilang
function tgl_indo(){
	$tgl=date("d/m/Y/D/M");
	echo "$tgl <br>";
	$potong=explode("/", $tgl);
	
	$sekarang = $potong[3];
	$tgl1 = $potong[0];
	$bln = $potong[4];
	$thn = $potong[2];

	if($sekarang == "Mon")
	{
		$sekarang == "Senin";
	}elseif ($sekarang = "Tue") {
		$sekarang = "Selasa";
	}elseif ($sekarang == "Wed") {
		$sekarang = "Rabu";
	}elseif ($sekarang == "Thu") {
		$sekarang = "Kamis";
	}elseif ($sekarang == "Fri") {
		$sekarang = "Jum'at";
	}elseif ($sekarang == "Sat") {
		$sekarang = "Sabtu";
	}elseif ($sekarang == "Sun") {
		$sekarang = "Minggu";
	}

	if($bln == "Jan")
	{
		$bln = "Januari";
	}elseif($bln == "Feb")
	{
		$bln = "Februari";
	}elseif($bln == "Mar")
	{
		$bln = "Maret";
	}elseif($bln == "Apr")
	{
		$bln = "April";
	}elseif($bln == "May")
	{
		$bln = "Mei";
	}elseif($bln == "Jun")
	{
		$bln = "Juni";
	}elseif($bln == "Jul")
	{
		$bln = "Juli";
	}
	elseif($bln == "Aug")
	{
		$bln = "Agustus";
	}elseif($bln == "Sep")
	{
		$bln = "September";
	}elseif($bln == "Oct")
	{
		$bln = "Oktober";
	}elseif($bln == "Nov")
	{
		$bln = "November";
	}elseif($bln == "Dec")
	{
		$bln = "Desember";
	}







	echo $sekarang.", ".$tgl1 ." ". $bln ." " . $thn;
}

 ?>
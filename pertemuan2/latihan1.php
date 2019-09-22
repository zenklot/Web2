<?php
// CONTOH STRPOS
$stringku ="Cepi Rahmat Hidayat";
$cari = "Rah";
$posisi=strpos($stringku, $cari);
echo "Posisi $cari ada di posisi ke $posisi";

echo "<br>";

// Contoh STR_REPLACE
$stringawal="Selamat datang di halaman web ini!";
$ubahstring=str_replace("web","website",$stringawal);
echo $ubahstring;

echo "<br>";

// CONTOH STRTOUPPER
$originalstring="String Capitalization 123";
$uppercase=strtoupper($originalstring);
echo "Old String - $originalstring<br>";
echo "New String - $uppercase";

echo "<br>";

// CONTOH STRTOLOWER
$originalstring = "STRING CAPITALIZATION 123";
$lowercase=strtolower($originalstring);
echo "Old String - $originalstring<br>";
echo "New String - $lowercase";

echo "<br>";

//Contoh UCWORD
$originalstring="a title that could use some hELP";
$ucword=ucwords($originalstring);
echo "Old String - $originalstring<br>";
echo "New String - $ucword";


echo "<br>";

//Contoh Explode
$phonenumber="800-555-5555";
$hasil=explode("-",$phonenumber,3);
echo "Pecahan 1 = $hasil[0]<br>";
echo "Pecahan 2 = $hasil[1]<br>";
echo "Pecahan 3 = $hasil[2]<br>";

echo "<br>";

//Contoh Implode
$pecahan=['Hello','World','I','am','Here!'];
$denganspasi=implode("",$pecahan);
$dengandash=implode("-",$pecahan);
echo "$denganspasi<br>";
echo $dengandash;
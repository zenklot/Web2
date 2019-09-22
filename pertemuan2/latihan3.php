<?php
//Contoh Untuk Menulis File
//Membuka suatu file dengan maksud untuk ditulis/diisi data
$fileku="file.txt";
$filehandle=fopen($fileku,'r') or die('File gagal dibuka');

//Membaca suatu file dengan batas 1000 karakter
$data = fread($filehandle,1000);

//Menutup suatu file
fclose($filehandle);
echo $data;
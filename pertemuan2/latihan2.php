<?php
//Contoh Untuk Menulis File
//Membuka suatu file dengan maksud untuk ditulis/diisi data
$fileku="file.txt";
$filehandle=fopen($fileku,'w') or die('File gagal dibuka');

//Menulis/mengisi data pada file yang telah dibuka
$datastring="Halo Amalia... \n";
fwrite($filehandle,$datastring);

//Menutup suatu file
fclose($filehandle);
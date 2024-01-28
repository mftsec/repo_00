<?php 
// path "/yenidosya1.txt"
$dosyaYolu = "yenidosya1.txt";


    $dosya = fopen($dosyaYolu,"r");

    //fwrite($dosya, "merhaba bu bir dosya yazma işlemidir");
    echo fread($dosya,filesize($dosyaYolu));
    fclose($dosya);


?> 
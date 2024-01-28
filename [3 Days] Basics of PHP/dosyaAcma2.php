<?php
$dosyaYolu = "yenidosya.txt";
$dosya = @fopen($dosyaYolu,"r");

if(!$dosya) {
    try{

        throw new Exception("dosya bulunamadi");


    } catch(Exception $e) {
        echo "hata: " . $e->getMessage() . " !!!!!!!!";
    }
}

?>
<?php
$name="furkan";
$age=25;
$gender=true;
$BMI=26.3;
$favNumber=4;
$takimTutma=false;
$dersCalisma=false;
$favGame="apex legends";
$ozelNumara;

echo "hello $name" . "<br>" ;
echo "hi again" . "<br>";
echo $favNumber + $BMI * 0 - $age . "<br>";

if($takimTutma !=0){
    echo "takim seçimi yapiniz";
 } else{
     echo "zaten bir takiminiz var";
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>if else switch; yaş kontrolü</h1>
    <form method="POST">
        <input type="number" name="yas" placeholder="yas giriniz">
        <button type="submit">ok</button>
    </form>
    
    <?php
    
    $yas = $_POST['yas'];
    if($yas > 65){
        echo "emeklilik zamani";
    } elseif($yas < 18){
        echo "çok gençsin";
    } else{
        echo "sorun yok";
    }

    ?>
</body>
</html>

<?php
echo "<br>";
for($i=0;$i<=10;$i++){
        
    echo $i . "<br>";
}

echo "<br";
echo "while dongüsü";
$number=0;
while($number <= 10){
    echo $number . "<br>";
    $number++;
}

?>

<?php
echo "<br>";
$sayi = 4;

for($i=0;$i<10;$i++){
    echo $i * $sayi . "<br>";
}
echo "<br>";


$faktoriyel=1;
$sayici=1;
while($sayici <= $sayi){
    $faktoriyel *= $sayici;
    $sayici++;
}

echo "sayinin faktöriyeli: $faktoriyel";

?>


<?php
function dikdörtgenAlani($en, $boy){

    return $en * $boy;
}

$alan = dikdörtgenAlani(3,5);
echo "dikdörtgen alani: $alan";
?>

<?php

$isimler = array("furkan", "ali", "cengiz", "hakan","ogün", "atakan" ,"bedirhan");

sort($isimler);

foreach($isimler as $isim){
    echo $isim . "<br>";
}

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$sayi = array(0,1,2,3,4,5,6,7,8,9,10);

$sonuc = array_filter($sayi, function($istenilen) {
    return $istenilen % 2 == 0;
});

$birlesmis = implode(", ", $sonuc );
foreach($sonuc as $son){
    echo $son;
}

?>


<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$icerik = "merhaba dunya !!!!!!";

$tersi_icerik =strrev($icerik);
echo "içeriğin tersi: $tersi_icerik" . "<br>";

$buyuk_icerik = strtoupper($icerik);
echo "içeriğin büyük hali: $buyuk_icerik" . "<br>";

$sesliHarfSayisi_icerik = preg_match_all('/[a,e,i,u,o,A,E,I,U,O]/',$icerik);
echo "içerikteki sesli harf sayisi: $sesliHarfSayisi_icerik" . "<br>";

?>

<?php

class Kitap {
    public $baslik;
    public $yazar;
    public $yayinTarihi;

    public function __construct($baslik, $yazar, $yayinTarihi){
        $this->baslik = $baslik;
        $this->yazar = $yazar;
        $this->yayinTarihi = $yayinTarihi;
    }

    public function bilgigösterme(){
        echo $this->baslik;
        echo $this->yazar;
        echo $this->yayinTarihi;
    }
    
}

class Ebook extends Kitap {

    public $dosyaBoyutu;

    public function __construct($baslik, $yazar, $yayinTarihi, $dosyaBoyutu) {
        parent::__construct($baslik, $yazar, $yayinTarihi);
        $this->dosyaBoyutu = $dosyaBoyutu;

    }    
        
    public function bilgigösterme()
    {
        parent::bilgigösterme();
        echo $this->dosyaBoyutu;
    }

}

?>



















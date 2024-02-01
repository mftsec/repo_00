<?php

$file = fopen("myFile.txt","r");
$content = fread($file, filesize("myFile.txt"));
fclose($file);


?>
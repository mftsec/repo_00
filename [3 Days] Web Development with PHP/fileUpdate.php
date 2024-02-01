<?php
$file = fopen("myFile.txt", "r");

$updatedContent = fread($file, filesize("myFile.txt"));


?>
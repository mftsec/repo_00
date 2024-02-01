<?php

$file = fopen("myFile.txt", "a");
fwrite($file," ///append edilen içerik///");
fclose($file);

?>
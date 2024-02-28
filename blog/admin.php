<?php

session_start();

if ($_SESSION['user_id'] !== 1) {
    
    http_response_code(403);
    echo "permission denided";

    exit;
    
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <a href="index.php">ANASAYFA</a>    

    <?php
    

    include 'getTitle.php';
    include 'getUser.php';






    ?>
</body>
</html>
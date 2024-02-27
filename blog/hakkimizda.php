
<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkımızda - mtf-sec</title>
    <link rel="stylesheet" href="hakkimizda.css">
</head>
<body>
        <div class="container">
            <header>
               <div>
                    <nav>
                        <ul>
                            <li><a href="index.php">Anasayfa</a></li>
                            
                        </ul>
                    </nav>
               </div> 
            </header>
            <section id="about">
                <h1>Hakkımızda</h1>
                <p>
                    xd
                </p>
            </section>
    </div>

    
</body>
</html>
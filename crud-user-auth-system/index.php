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
    <title>Index</title>
    <link rel="stylesheet" href="style.css">

</head>
<body class="body-style1">
    <p>XON</p>
    <?php
        echo "Welcome " . $_SESSION['username'] . " !";
    ?>
    
    <a href="update.php">Update Profile</a>
    <h1>Logout</h1>
    
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>



<?php
session_start();


if (!isset($_SESSION['username'])) {
    
    header("Location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <p>XON</p>
    <?php
        echo "Welcome " . $_SESSION['username'] . " !";
    ?>
    <h1>Logout</h1>
    <!-- logout işlemi için bir form -->
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>



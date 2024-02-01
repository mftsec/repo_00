<?php
include 'sessionManager.php';
echo 'welcome ' . $_SESSION['user_name'] . "<br>";
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    if (isset($_COOKIE['preferred_theme'])) {
        $theme = $_COOKIE['preferred_theme'];
        echo "Preferred Theme " . $theme;
    
    } else {
        echo "no preferred theme set";
    }
    ?>

</head>
<body>
    <h2>contact form</h2>
    <form action="formDogrulama.php" method="POST" >
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>

        <label for="age">Age</label>
        <input type="number" id="age" name="age" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html>


<?php
include 'fileRead.php';
echo $content . "<br>";
?>


<?php
include 'fileUpdate.php';
echo $updatedContent;
?>







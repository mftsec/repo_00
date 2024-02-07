<?php
include 'mysqlConnection.php';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="add_todo.php" method="POST">
            YAPILACAKLAR: <input type="text" name="todo">
        <input type="submit" value="ekle">

        </form>
    </div>
</body>
</html>



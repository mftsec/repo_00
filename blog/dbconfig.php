<?php

$servername = "localhost";
$db_username = "root";
$db_password = "kudurtansehirxd123";
$database = "CMS";

$conn = new mysqli($servername,$db_username,$db_password,$database);

if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);

}

?>



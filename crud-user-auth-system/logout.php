
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Oturumu sonlandır
    session_unset();
    session_destroy();

    // Yönlendirme
    header("Location: login.php");
    exit;
}
?>
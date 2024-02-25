<?php
session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = ""; // Dosyanın yükleneceği klasör
    $target_file = $target_dir . basename($_FILES["dosya"]["name"]);
    $dosya_tipi = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($_FILES["dosya"]["size"] > 10000000) {
        $message = "Üzgünüz, dosyanızı yüklerken bir hata oluştu. Dosya 10 MB'dan büyük olmamalıdır.";
    } elseif (!in_array($dosya_tipi, array("jpg", "png", "jpeg", "gif"))) {
        $message = "Üzgünüz, sadece JPG, JPEG, PNG & GIF dosya formatlarına izin verilmektedir.";
    } elseif (!move_uploaded_file($_FILES["dosya"]["tmp_name"], $target_file)) {
        $message = "Üzgünüz, dosyanızı yüklerken bir hata oluştu.";
    } else {
        $message = "Dosya başarıyla yüklendi: " . basename($_FILES["dosya"]["name"]);
        
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <div>
                <h2>Dosya yükleme formu</h2>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="dosya" id="dosya">
                    <button type="submit" name="submit">Dosyayı Yükle</button>
                </form>
                <div id="yuklenenDosyaAlani"></div>
            

                <script>
                    
                    var message = "<?php echo $message; ?>";
                    if (message) {
                        alert(message);
                    }
                </script>
                <div>
                    <a href="index.php">go back </a>
                </div>
            </div>
    
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body-style2">
   

    <div class="login-container">
        <form action="login.php" method="post" >
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>
            <br>       
            <br>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>
            <br>
            <br>       
            <button type="submit">Login</button>
            <br>
            <br>
            <p>you don't have an account yet <a href="register.php">register</a></p>
        </form>
    </div>


</body>
</html>

<?php



if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    


    $username = $_POST['username'];
    $password = $_POST['password'];


    if(empty($username) || empty($password)) {

        echo "kullanıcı adı yada şifre eksik";
        exit;
    }


    try {
        include 'conn.php';
        $sql = "SELECT username,password,id FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $user =$result->fetch_assoc();

        
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];

            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('kullanıcı adı veya şifre hatalı')</script>";
        }


    } catch (Exception $e) {
        
        echo "Hata oluştu: " . $e->getMessage();

    }


}
?>



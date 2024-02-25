<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="register.css">
    
       
</head>
<body>

    <div class="container">
        <h2>Kayıt Ol</h2>
        <form id="registerForm">
            <label for="email"><b>E-Posta</b></label>
            <input type="email" placeholder="E-posta adresinizi girin" name="email" id="email" required>

            <label for="username"><b>Kullanıcı Adı</b></label>
            <input type="text" placeholder="Kullanıcı adınızı girin" name="username" id="username" required>

            <label for="password"><b>Şifre</b></label>
            <input type="password" placeholder="Şifrenizi girin" name="password" id="password" required>

            <button type="button" onclick="register()">Kayıt Ol</button>
            <p>already have an account <a href="login.php">sign in</a></p>
        </form>
    </div>

    <script>
        function register() {

            var formdata= {
                email: document.getElementById("email").value,
                username: document.getElementById("username").value,
                password: document.getElementById("password").value
                
            };

            fetch('registerapi.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(formdata)
            })

            .then(response => response.json())
            
            .then(data => {
                console.log(data);
                if(data.status === 'success') {
                    alert('register işlemi başarılı');
                    document.getElementById("registerForm").reset();
                } else {
                    alert('hata:' + data.message);
                }
            })

            .catch(error => {
                console.error('hata: ', error);
            });



        };
    </script>









</body>
</html>
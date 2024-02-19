<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <form id="registerForm">
            <h1>Register</h1>

            <p>pls fill this form</p>
            <hr>
            <label for="username"><b>User Name</b></label>
            <input type="text" placeholder="enter username" name="username" id="username" required>
            <br>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="enter email" name="email" id="email" required>
            <br>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="enter password" name="password" id="password" required>
            <br>
            <button type="button" onclick="register()">register</button>

            
            
        </form>

    </div>
    <div class ="container signin">
        <p>already have an accoun? <a href="login.php">sign in</a> </p>
    </div>

    <script>
        function register() {

            var formdata= {
                username: document.getElementById("username").value,
                email: document.getElementById("email").value,
                password: document.getElementById("password").value
            };

            fetch('registerapi.php', {

                method:'POST',
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
            })


        }
    </script>



</body>
</html>
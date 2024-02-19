<h2>Kullanıcıyı Düzenle</h2>
<form id="updateForm">
    ID: <input type="number" name="id" id="id"><br>
    Kullanıcı Adı: <input type="text" name="username" id="username"><br>
    E-posta: <input type="text" name="email" id="email"><br>
    Şifre: <input type="password" name="password" id="password"><br>
    <button type="button" onclick="updateForm()">güncelle</button>
</form>


<script>
    function updateForm() {
        var formdata = {
            id: document.getElementById("id").value,
            username: document.getElementById("username").value,
            email: document.getElementById("email").value,
            password: document.getElementById("password").value
        };

        fetch('updateapi.php', {
            method:'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(formdata)
        })

        .then(response => response.json())
        .then(data => {
            console.log(data);
            if(data.status === 'success') {
                alert('kullanıcı güncellendi')
                document.getElementById("updateForm").reset();
            } else  {
                alert('hata:' + data.message);
            }
        })
        .catch(error => {
            console.error('hata: ', error);
        })
    }
</script>
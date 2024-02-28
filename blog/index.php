<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mft-sec</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        header nav ul li {
            margin-right: 10px;
        }

        header nav ul li:last-child {
            margin-right: 0;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        header nav ul li a:hover {
            background-color: #555;
        }

        .container-main {
            display: flex;
            justify-content: center;
            align-items: stretch;
            border: 1px solid #ccc;
            background-color: #fff;
            margin: 20px 0;
        }

        .container-main > div {
            flex: 1;
            border-right: 1px solid #ccc;
        }

        .container-main > div:last-child {
            border-right: none;
        }

        .left-column, .right-column {
            padding: 3%;
            
        }

        .center-column {
            padding: 40px;
            height: 78vh;
            overflow-y: auto;
        }

        
    </style>



        

    
   
</head>
<body>

    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><h1>ID: <?php echo $_SESSION['user_id']?></h1></li>
                    <li><h1>User: <?php echo $_SESSION['username']?></h1></li>
                </ul>
            </nav>
            <nav>
                <ul>
                    
                    <li><a href="admin.php">admin page</a></li>
                    <li><a href="upload.php">file upload</a></li>
                    <li><a href="hakkimizda.php">Hakkımızda</a></li>
                    
                    <li><a href="posts.php">posts</a></li>
                    
                    
                    <li>
                        <form action="logout.php" method="POST">
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container-main">
        <div class="left-column">
            <h2>GÖNDERİ</h2>
            <form id="yorumForm">
                <label for="comment"><?php echo $_SESSION['username']?>'s Comments:</label><br>
                <textarea name="title" id="title" cols="30" rows="1" placeholder="title" style="resize: none;" required></textarea><br>
                <textarea id="comment" name="comment" rows="20" cols="62" placeholder="comments" style="resize: none;"></textarea><br>
                <button type="button" onclick="yorumGonder()">Gönder</button>
            </form>
            
        </div>

        <div class="center-column">
            <?php include 'posts.php';?>
            
        </div>

        <div class="right-column">
            
        </div>
    </div>



    <script>

        function yorumGonder() {

            var formdata = {
            comment: document.getElementById("comment").value,
            title: document.getElementById("title").value

            };

            fetch('postComment.php', {
                method: 'POST',
                headers: {'Content-Type':'application/json'},
                body: JSON.stringify(formdata)


            })

            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.status === 'success') {
                    alert("yorum gönderildi")
                    document.getElementById("yorumForm").reset();
                } else {
                    alert('hata:' + data.message);
                }
        })

        .catch (error => {
            console.error('hata: ', error);
        })



        }

        
        fetch('getComments.php')
        .then(response => response.json())
        .then(data => {
            var yorumlarDiv = document.getElementById('yorumlar');
            data.forEach(yorum => {
                var yorumDiv = document.createElement('div');
                yorumDiv.innerHTML = '<strong>[' + yorum.username + ']</strong>' + '<strong>' + yorum.title + '</strong>: ' + yorum.content;
                yorumlarDiv.appendChild(yorumDiv); 
            })
            
        })
        .catch(error => console.error('Yorumlar çekilirken hata oluştu:', error));



       
        



    </script>
  
</body>
</html>
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
    <title>Page-based Pagination</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #post-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px; /* Daha az padding */
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .post {
            padding: 20px;
            border-bottom: 1px solid #ccc;
            overflow: hidden; /* Dikey taşmaları gizle */
            word-wrap: break-word; /* Uzun kelimeleri satır sonunda kes */
        }

        #pagination-container {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 12px; /* Düzeltme: Yatay boşluk azaltıldı */
            text-decoration: none;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            margin: 0 4px;
            transition: background-color 0.3s;
            font-size: 14px; /* Düzeltme: Sayfa numaralarının boyutu belirlendi */
        }

        .pagination a:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* Yeni stil tanımı */
        .page-number {
            display: inline-block;
            padding: 8px 12px;
            margin: 0 4px;
            font-size: 14px;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .page-number:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div id="post-container"></div> <!-- postList olarak değiştirildi -->
    <div id="pagination-container"></div>
    <div><a href="index.php">anasayfa</a></div>

    <script>
        var currentPage = 1;
        var postsPerPage = 4; // Yorum yerine gönderi sayısı

        var postList = document.getElementById('post-container'); // Değiştirildi
        var pagination = document.getElementById('pagination-container');

        // Fonksiyon: Gönderileri al
        function fetchPosts(page) {
            fetch('getComments.php?page=' + page)
                .then(response => response.json())
                .then(data => {
                    displayPosts(data);
                    currentPage = page; // Geçerli sayfayı güncelle
                })
                .catch(error => console.error('Gönderileri alırken bir hata oluştu:', error));
        }

        // Fonksiyon: Gönderileri göster
        function displayPosts(posts) {
            postList.innerHTML = ''; // Önceki gönderileri temizle
            posts.forEach(post => {
                var postDiv = document.createElement('div');
                postDiv.classList.add('post'); // comment yerine post
                postDiv.innerHTML = '<strong>[' + post.username + ']</strong> <strong>' + post.title + '</strong>: ' + post.content;
                postList.appendChild(postDiv);
            });
        }

        // Fonksiyon: Daha fazla gönderi yükle
        function loadMorePosts() {
            currentPage++;
            fetchPosts(currentPage);
        }

        // Sayfa yüklendiğinde gönderileri al
        fetchPosts(currentPage);

        // Pagination bağlantılarını oluştur
        function createPaginationLinks() {
            var totalPages = 10; // Örnek olarak 10 sayfa
            for (var i = 1; i <= totalPages; i++) {
                var pageLink = document.createElement('span'); // Değiştirildi: a etiketi yerine span
                pageLink.classList.add('page-number'); // Değiştirildi: CSS sınıfı eklendi
                pageLink.textContent = i;
                pageLink.addEventListener('click', function() {
                    currentPage = parseInt(this.textContent);
                    fetchPosts(currentPage);
                });
                pagination.appendChild(pageLink);
            }
        }

        // Sayfa yüklendiğinde pagination bağlantılarını oluştur
        createPaginationLinks();

    </script>
</body>
</html>

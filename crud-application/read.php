<?php
include 'conn.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 10;
$offset = ($page - 1) * $records_per_page;

try {
    $sql = "SELECT * FROM users LIMIT :offset, :records_per_page";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($result) {
        echo "<h2>Kullanıcılar</h2>";
        echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Kullanıcı Adı</th>
                <th>E-posta</th>
            </tr>";
        
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "Kayıt bulunamadı.";
    }

    $sql_count = "SELECT COUNT(*) AS total FROM users";
    $stmt_count = $conn->query($sql_count);
    $total_records = $stmt_count->fetch()['total'];
    $total_pages = ceil($total_records / $records_per_page);

    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='read.php?page=" . $i . "'>" . $i . "</a> ";
    }
} catch(PDOException $e) {
    echo "Hata: " . $e->getMessage();
}

$conn = null;
?>

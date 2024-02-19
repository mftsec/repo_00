<?php
require_once("conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            $rows[] = $row;
        }
    }

    $html_table = '<table border="1">';
    $html_table .= '<tr><th>ID</th><th>Username</th><th>Email</th><th>Password</th></tr>';
    foreach ($rows as $row) {
        $html_table .= '<tr>';
        $html_table .= '<td>' . $row['id'] . '</td>';
        $html_table .= '<td>' . $row['username'] . '</td>';
        $html_table .= '<td>' . $row['email'] . '</td>';
        $html_table .= '<td>' . $row['password'] . '</td>';
        $html_table .= '</tr>';
    }
    $html_table .= '</table>';

    
    echo $html_table;



} else {
    http_response_code(405);
    echo json_encode(array("message" => "method not allowed"));

}


?>
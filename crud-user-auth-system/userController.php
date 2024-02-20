<?php

include 'conn.php';

class UserController {
    private $conn;

    public function __construct() {
        $this->conn = $conn;

    }

    public function updateUser($data) {
        $id = $data['id'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];

        try {
            $sql = "UPDATE users SET username=?, email=?, password=? WHERE id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssi", $username, $email, $password, $id);

            if ($stmt->execute()) {
                $response = array('status' => 'success', 'message' => 'Kullanıcı başarıyla güncellendi.');
            } else {
                $response = array('status' => 'error', 'message' => 'Kullanıcı güncellenirken bir hata oluştu.');
            }
        } catch(PDOException $e) {
            $response = array('status' => 'error', 'message' => 'Hata: ' . $e->getMessage());
        }

        return $response;
    }

















}   









?>
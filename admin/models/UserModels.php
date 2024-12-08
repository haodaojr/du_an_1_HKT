<?php 
// models/UserModel.php
class UserModel {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function __destruct() {
        $this->conn = null;
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM `user`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getOne($userId) {
        try {
            $sql = "SELECT * FROM `user` WHERE user_id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateRole($userId, $userRole) {
        try {
            $sql = "UPDATE `user` SET user_role = :user_role WHERE user_id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':user_role', $userRole);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>
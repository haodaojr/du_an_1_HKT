<?php
class userModel {
    public $conn;
    public function __construct() {
        $this->conn = connectDB();
    }

    public function insert($user_name, $user_email, $user_password, $user_role, $user_address, $user_phone) {
        try {
            $sql = "INSERT INTO `user` (`user_name`, `user_email`, `user_password`, `user_role`, `user_address`, `user_phone`) VALUES (:user_name, :user_email, :user_password, :user_role, :user_address, :user_phone)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':user_email', $user_email);
            $stmt->bindParam(':user_password', $user_password);
            $stmt->bindParam(':user_role', $user_role);
            $stmt->bindParam(':user_address', $user_address);
            $stmt->bindParam(':user_phone', $user_phone);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function dangnhap($email, $password) {
        try {
            $sql = "SELECT * FROM `user` WHERE (user_email = :email OR user_phone = :email) AND user_password = :password";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

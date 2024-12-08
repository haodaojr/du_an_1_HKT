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
                $sql = "SELECT * FROM user WHERE user_email = :email";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
                if ($user) {
                    if (password_verify($password, $user['user_password'])) {
                        return $user;
                    } else {
                        echo "Mật khẩu không đúng.";
                    }
                } else {
                    echo "Email không tồn tại.";
                }
                return false;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        

        public function checkEmailExists($email) {
            $sql = "SELECT * FROM user WHERE user_email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về thông tin người dùng nếu email tồn tại
        }

        // Phương thức gửi email khôi phục mật khẩu
        public function sendPasswordResetEmail($email) {
            // Đây là nơi bạn sẽ tích hợp thư viện gửi email như PHPMailer
            // Ví dụ: Gửi email với liên kết khôi phục mật khẩu

            $subject = "Khôi phục mật khẩu";
            $message = "Nhấp vào liên kết dưới đây để khôi phục mật khẩu của bạn: \n";
            $message .= "http://yourwebsite.com/reset_password.php?email=" . urlencode($email); // Đường dẫn khôi phục mật khẩu
            $headers = "From: no-reply@yourwebsite.com\r\n";

            // Gửi email
            return mail($email, $subject, $message, $headers);
        }
    }
    ?>
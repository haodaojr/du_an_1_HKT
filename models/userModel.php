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
        // Thực hiện truy vấn để kiểm tra email và mật khẩu trong cơ sở dữ liệu
        $sql = "SELECT * FROM user WHERE user_email = :email";
    
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);
    
        // Gắn giá trị cho các tham số
        $stmt->bindParam(':email', $email);
    
        // Thực thi câu lệnh
        $stmt->execute();
    
        // Kiểm tra xem có kết quả trả về không
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Nếu tìm thấy người dùng
        if ($user) {
            // Kiểm tra mật khẩu
            if (password_verify($password, $user['user_password'])) {
                // Nếu mật khẩu đúng, trả về thông tin người dùng
                return $user;
            } else {
                // Nếu mật khẩu không khớp
                return false;
            }
        } else {
            // Nếu không tìm thấy người dùng
            return false;
        }
    }
    
}
?>

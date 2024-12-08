<?php
class userController {
    public $userModel;
    public function __construct() {
        $this->userModel = new userModel();
    }

    public function insert2() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
            $user_role = 1;
            $user_address = $_POST['user_address'];
            $user_phone = $_POST['user_phone'];
    
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
    
            // Lưu thông tin người dùng vào cơ sở dữ liệu
            $this->userModel->insert($user_name, $user_email, $hashed_password, $user_role, $user_address, $user_phone);
            header('location:?act=login');
        }
        require_once 'views/user/dangky.php';
    }
    

    public function dangnhap() {
        // session_start();  // Bắt đầu session, đảm bảo gọi session_start() một lần
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
    
            // Kiểm tra đăng nhập
            $user = $this->userModel->dangnhap($user_email, $user_password);
    
            if ($user) {
                // Đăng nhập thành công, lưu thông tin người dùng vào session
                $_SESSION['user_id'] = $user['user_id'];  // Giả sử user có trường 'id'
                $_SESSION['user_name'] = $user['user_name'];  // Lưu tên người dùng (kiểm tra đúng tên trường trong DB)
                $_SESSION['user_email'] = $user['user_email']; // Lưu email người dùng
                $_SESSION['user_role'] = $user['user_role'];
                $_SESSION['user_address']=$user['user_address'];
                $_SESSION['user_phone']=$user['user_phone'];
                header('Location: ?act=/');  // Chuyển hướng về trang chủ
                exit(); // Đảm bảo dừng mã ngay sau khi chuyển hướng
            } else {
                // Đăng nhập thất bại
                echo "Sai email hoặc mật khẩu.";
            }
        }
        require_once 'views/user/dangnhap.php';
    }
    public function logout(){

        // Hủy tất cả các biến phiên
        session_unset();
        // Hủy phiên làm việc
        session_destroy();
        // Chuyển hướng người dùng đến trang đăng nhập hoặc trang chủ
        header("Location: index.php");
        exit();
    }
    
    
}
?>

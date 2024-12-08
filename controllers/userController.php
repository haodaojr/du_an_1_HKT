<?php
class userController {
    public $userModel;

    public function __construct() {
        $this->userModel = new userModel();
    }

    public function insert2() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Làm sạch dữ liệu đầu vào
            $user_name = trim($_POST['user_name']);
            $user_email = trim($_POST['user_email']);
            $user_password = $_POST['user_password'];
            $user_address = trim($_POST['user_address']);
            $user_phone = trim($_POST['user_phone']);

            // Xác thực dữ liệu đầu vào
            $errors = [];
            if (empty($user_name)) {
                $errors[] = "Tên người dùng không được để trống.";
            }
            if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ.";
            }
            if (empty($user_password) || strlen($user_password) < 6) {
                $errors[] = "Mật khẩu cần ít nhất 6 ký tự.";
            }
            if (empty($user_address)) {
                $errors[] = "Địa chỉ không được để trống.";
            }
            if (empty($user_phone)) {
                $errors[] = "Số điện thoại không được để trống.";
            }

            // Nếu có lỗi, hiển thị và giữ lại trang đăng ký
            if (!empty($errors)) {
                echo "<script>alert('" . implode("\\n", $errors) . "');</script>";
                require_once 'views/user/dangky.php'; // Giữ lại trang đăng ký
                return; // Dừng xử lý nếu có lỗi
            }

            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

            // Lưu thông tin người dùng vào cơ sở dữ liệu
            $this->userModel->insert($user_name, $user_email, $hashed_password, 1, $user_address, $user_phone);
            header('Location: ?act=login');
            exit();
        }
        require_once 'views/user/dangky.php';
    }

    public function dangnhap() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Làm sạch dữ liệu đầu vào
            $user_email = trim($_POST['user_email']);
            $user_password = $_POST['user_password'];

            // Xác thực dữ liệu đầu vào
            $errors = [];
            if (empty($user_email)) {
                $errors[] = "Email không được để trống.";
            }
            if (empty($user_password)) {
                $errors[] = "Mật khẩu không được để trống.";
            }

            // Nếu có lỗi, hiển thị và giữ lại trang đăng nhập
            if (!empty($errors)) {
                echo "<script>alert('" . implode("\\n", $errors) . "');</script>";
                require_once 'views/user/dangnhap.php'; // Giữ lại trang đăng nhập
                return; // Dừng xử lý nếu có lỗi
            }

            // Kiểm tra đăng nhập
            $user = $this->userModel->dangnhap($user_email, $user_password);

            if ($user) {
                // Đăng nhập thành công, lưu thông tin người dùng vào phiên
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['user_email'] = $user['user_email'];
                $_SESSION['user_role'] = $user['user_role'];
                $_SESSION['user_address'] = $user['user_address'];
                $_SESSION['user_phone'] = $user['user_phone'];
                header('Location: ?act=/');
                exit();
            } else {
                // Đăng nhập thất bại
                echo "<script>alert('Sai email hoặc mật khẩu.');</script>";
            }
        }
        require_once 'views/user/dangnhap.php';
    }

    public function forgot_password() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_email = trim($_POST['user_email']);
    
            if (empty($user_email) || !filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Email không hợp lệ.');</script>";
                require_once 'views/user/forgot_password.php'; // Giữ lại trang quên mật khẩu
                return;
            }
    
            // Kiểm tra xem email có tồn tại không
            if ($this->userModel->checkEmailExists($user_email)) {
                // Gửi email khôi phục mật khẩu
                if ($this->userModel->sendPasswordResetEmail($user_email)) {
                    echo "<script>alert('Một liên kết khôi phục mật khẩu đã được gửi đến email của bạn.');</script>";
                } else {
                    echo "<script>alert('Có lỗi xảy ra khi gửi email.');</script>";
                }
            } else {
                echo "<script>alert('Email không tồn tại trong hệ thống.');</script>";
            }
        }
        require_once 'views/user/quenmatkhau.php'; // Tạo trang forgot_password.php cho giao diện
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>
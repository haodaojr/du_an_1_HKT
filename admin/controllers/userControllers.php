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
            $this->userModel->insert($user_name, $user_email, $user_password, $user_role, $user_address, $user_phone);
            header('location:?act=dangnhap');
        }
        require_once 'views/user/dangky.php';
    }

    public function dangnhap() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
            $this->userModel->dangnhap($user_email, $user_password);
            header('location:?act=list_product');
        }
        require_once 'views/user/dangnhap.php';

    }
}
?>

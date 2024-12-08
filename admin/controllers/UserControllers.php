<?php 
// controllers/UserController.php
class UserController {
    public $UserModel;

    public function __construct() {
        $this->UserModel = new UserModel();
    }

    public function __destruct() {
        $this->UserModel = null;
    }

    public function UserAll() {
        $users = $this->UserModel->getAll();
        require_once 'views/user/listuser.php';
    }

    public function editUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = trim($_POST['user_id']);
            $userRole = trim($_POST['user_role']);
    
            // Cập nhật vai trò người dùng
            $this->UserModel->updateRole($userId, $userRole);
            header('Location: ?act=list_user');
            exit();
        }
    
        $userId = $_GET['user_id'];
        $user = $this->UserModel->getOne($userId);
        require_once 'views/user/edit_user.php'; // Hiển thị form chỉnh sửa vai trò
    }
}
?>
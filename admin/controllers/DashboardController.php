<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != '0') {
    echo "<script>
        alert('Bạn không phải quản trị viên');
        window.history.back();
    </script>";
    exit();
}




class DashboardController {
    public function index() {
        require_once "./views/dashboard.php";
    }
    
}
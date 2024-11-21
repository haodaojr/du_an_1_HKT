<?php 
session_start(); 
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/userController.php';

// Require toàn bộ file Models
require_once './models/userModel.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->home(),
    'about'                 => (new HomeController())->about(),
    'product'           => (new HomeController())->product(),
    'store'             => (new HomeController())->store(),
    'feature'           => (new HomeController())->feature(),
    'blog'              => (new HomeController())->blog(),
    'testimonial'       => (new HomeController())->testimonial(),
    '404'               => (new HomeController())->t404(),
    'contact'           => (new HomeController())->contact(),
    'Pro_detail'           => (new HomeController())->Pro_detail(),
    //user
    'signup'            =>(new userController())->insert2(),
    'login'             =>(new userController())->dangnhap(),
    'logout'            =>(new userController())->logout(),
};
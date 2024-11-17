<?php 
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/userControllers.php';
// Require toàn bộ file Models
require_once 'models/ProductModel.php';
require_once 'models/userModel.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'                 => (new DashboardController())->index(),


    //Product
    'list_product'=>(new ProductController())->productAll(),
    'them-san-pham'=>(new ProductController())->addProduct(),
    'sua-san-pham'=>(new ProductController())->editProduct(),
    'xoa-san-pham'=>(new ProductController())->delete(),

    //user
    'dangky'=>(new userController())->insert2(),
    'dangnhap'=>(new userController())->dangnhap()
};
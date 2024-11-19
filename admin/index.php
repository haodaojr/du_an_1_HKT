<?php 
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/CategoryControllers.php';


// Require toàn bộ file Models
require_once 'models/ProductModel.php';
require_once 'models/CategoryModels.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/' => (new DashboardController())->index(),

    // Category
    'list_cate' => (new CategoryControllers())->Allcate(),
    'insert_cate' => (new CategoryControllers())->insertcate(), // Removed the leading space
    'delete_cate' => (new CategoryControllers())->deletecate(),
    'update_cate' => (new CategoryControllers())->updatecate($_GET['product_category_id']),

    // Product
    'list_product' => (new ProductController())->productAll(),
    'them-san-pham' => (new ProductController())->addProduct(),
    'sua-san-pham' => (new ProductController())->editProduct(),
    'xoa-san-pham' => (new ProductController())->delete(),
};
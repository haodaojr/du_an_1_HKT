<?php 
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/CategoryControllers.php';
require_once 'controllers/BillController.php';
require_once 'controllers/ReviewControllers.php';
require_once 'controllers/UserControllers.php';




// Require toàn bộ file Models
require_once 'models/ProductModel.php';
require_once 'models/CategoryModels.php';
require_once 'models/billModel.php';
require_once 'models/ReviewModels.php';
require_once 'models/UserModels.php';



// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/' => (new DashboardController())->index(),

    // Category
    'list_cate'     => (new CategoryControllers())->Allcate(),
    'insert_cate'   => (new CategoryControllers())->insertcate(), // Removed the leading space
    'delete_cate'   => (new CategoryControllers())->deletecate(),
    'update_cate'   => (new CategoryControllers())->updatecate($_GET['product_category_id']),

    // Product
    'list_product'  => (new ProductController())->productAll(),
    'them-san-pham' => (new ProductController())->addProduct(),
    'sua-san-pham'  => (new ProductController())->editProduct(),
    'xoa-san-pham'  => (new ProductController())->delete(),
    //orders
    'list_bill'   =>(new BillController())->getall(),
    'edit_bill'     =>(new BillController())->update(),
    
    // reviews
    'list_review'   =>(new ReviewControllers())->ReviewAll(),
    'delete_review' =>(new ReviewControllers())->delete(),

     //user
     'list_user' => (new UserController())->UserAll(),
     'edit_user' => (new UserController())->editUser(),
};
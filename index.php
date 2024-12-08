<?php 
session_start(); 
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/userController.php';
require_once './controllers/cartController.php';
require_once './controllers/reviewController.php';
require_once './controllers/billController.php';
require_once './controllers/SearchControllers.php';


// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/userModel.php';
require_once './models/cartModel.php';
require_once './admin/models/CategoryModels.php';
require_once './models/reviewModel.php';
require_once './models/billModel.php';
require_once './models/SearchModels.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->home(),
    'about'                 => (new HomeController())->about(),
    'product'           => (new HomeController())->product(),
    'feature'           => (new HomeController())->feature(),
    'blog'              => (new HomeController())->blog(),
    'testimonial'       => (new HomeController())->testimonial(),
    '404'               => (new HomeController())->t404(),
    'contact'           => (new HomeController())->contact(),
    'detail'            => (new HomeController())->detail(),

    //user
    'signup'            =>(new userController())->insert2(),
    'login'             =>(new userController())->dangnhap(),
    'logout'            =>(new userController())->logout(),
    'forgot_password'   =>(new userController())->forgot_password(),

    //cart
    'add_to_cart'       =>(new CartController())->addtocart(),
    'viewCart'          =>(new CartController())->cart(),
    'update_cart'       =>(new CartController())->updateCart(),
    'remove_from_cart'  =>(new CartController())->deleteCartItem(),
    
    //search
    'search'            =>(new HomeController())->search(),
    'review'            =>(new ReviewController())->review(),
    'add_review'        =>(new ReviewController())->addReview(),

    //bill
    'create_order'      =>(new BillController())->createOrder(),
    'addBill'           =>(new BillController())->addBill(),
    'oderstatus'        =>(new BillController())->orderStatus(),
    'cancel_order'      =>(new BillController())->cancelOrder(),
    'billhistory'       =>(new BillController())->billhistory(),
    //Search-Product
    'search_product'    =>(new SearchControllers())->search_product(),
};
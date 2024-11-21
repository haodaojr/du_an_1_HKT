<?php
require_once 'models/ProductModels.php';
class HomeController
{
  public $ProductMOdels;
  function __construct()
  {
    $this->ProductMOdels = new ProductMOdels();
  }
  public function home()
  {
    $Product = $this->ProductMOdels->ShowAll();
    $Another = $this->ProductMOdels->ShowAnother();
    require_once 'views/home.php';
  }
  public function Pro_detail()
  {
      if (isset($_GET['product_id']) && $_GET['product_id']) {
          $product_id = intval($_GET['product_id']);
          $SPCT = $this->ProductMOdels->Pro_Detail($product_id);
          
          // Lấy tất cả sản phẩm để hiển thị
          $otherProducts = $this->ProductMOdels->ShowAll();
  
          // Ghi log để kiểm tra giá trị của $SPCT
          error_log(print_r($SPCT, true));
          
          if ($SPCT) {
              require_once 'views/Product_detail.php';
          } else {
              // Nếu không tìm thấy sản phẩm, chuyển hướng về trang chủ
              header('Location: ?act=/');
              exit;
          }
      } else {
          // Nếu không có ID sản phẩm, chuyển về trang chủ
          header('Location: ?act=/');
          exit;
      }
  }


  public function about()
  {
    require_once 'views/about.php';
  }
  public function store()
  {
    require_once 'views/store.php';
  }
  public function contact()
  {
    require_once 'views/contact.php';
  }
  public function feature()
  {
    require_once 'views/feature.php';
  }
  public function testimonial()
  {
    require_once 'views/testimonial.php';
  }
  public function product()
{
    $Prod = $this->ProductMOdels->ShowAll();
    require_once 'views/product.php'; // Đảm bảo rằng nó gọi đúng view
}
  public function t404()
  {
    require_once 'views/404.php';
  }
  public function blog()
  {
    require_once 'views/blog.php';
  }
}
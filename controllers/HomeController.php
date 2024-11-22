<?php 

class HomeController
{
    public $product_model;
    public function __construct(){
      $this->product_model = new ProductModel();
    }
    public function home() {
      $products=$this->product_model->getAll();
      $productThere=$this->product_model->getThere();
      require_once 'views/home.php';  
    }
    public function about() {
      require_once 'views/about.php';  
    }
    public function store(){
      require_once 'views/store.php';
    }
    public function contact(){
      require_once 'views/contact.php';
    }
    public function feature(){
      require_once 'views/feature.php';
    }
    public function testimonial(){
      require_once 'views/testimonial.php';
    }
    public function product(){
      $products=$this->product_model->getAll();
      require_once 'views/product.php';
    }
    public function t404(){
      require_once 'views/404.php';
    }
    public function blog(){
      require_once 'views/blog.php';
    }public function detail() {  
      // Kiểm tra xem có truyền id không  
      if (isset($_GET['id'])) {  
          $id = (int)$_GET['id']; // Chuyển đổi id sang kiểu số nguyên  
          $product = $this->product_model->getOne($id);
          $product2=$this->product_model->getcate($id);  
          
          // Kiểm tra xem sản phẩm có tồn tại không  
          if ($product&&$product2) {  
              require_once 'views/detail.php'; // Gọi view hiển thị chi tiết sản phẩm  
          } else {  
              // Nếu không tìm thấy sản phẩm  
              echo "Product not found.";  
          }  
      } else {  
          // Nếu không có id được truyền  
          echo "ID not provided.";  
      }  
  }
}
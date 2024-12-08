<?php
class HomeController
{
  public $product_model;
  public $category;
  public $review;
  public function __construct()
  {
    $this->product_model = new ProductModel();
    $this->category = new CategoryModels();
    $this->review = new ReviewModel();
  }
  public function home()
  {
    $products = $this->product_model->getnew();
    $productThere = $this->product_model->getThere();
    require_once 'views/home.php';
  }
  public function about()
  {
    require_once 'views/about.php';
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
    $category = $this->category->Allcate();
    $products = $this->product_model->getAll();
    require_once 'views/product.php';
  }
  public function search()
  {
    // Khởi tạo biến $category
    $category = $this->category->Allcate();

    // Khởi tạo biến $products là một mảng rỗng
    $products = [];

    // Kiểm tra phương thức yêu cầu
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $search = $_POST['search'];
      if ($search == 0) {
        $_SESSION['error'] = "Bạn chưa chọn danh mục";
      } else {
        $products = $this->product_model->search($search);
        unset($_SESSION['error']); // Xóa thông báo lỗi nếu tìm kiếm thành công
      }
    }

    // Kiểm tra nếu $category không phải là mảng hoặc đối tượng
    if (!is_array($category) && !is_object($category)) {
      $category = [];
    }

    require_once 'views/product.php';
  }

  public function t404()
  {
    require_once 'views/404.php';
  }
  public function blog()
  {
    require_once 'views/blog.php';
  }
  public function detail()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $product = $this->product_model->getOne($id);
      $product2 = $this->product_model->getcate($id);
      $reviews = $this->review->getReviewsByProductId($id);
      $check = null;
      $check2 = null;
      if (isset($_SESSION['user_id'])) {
        $check = $this->review->checkBillDetail($_SESSION['user_id'], $id);
        $check2 = $this->review->checkReview($_SESSION['user_id'], $id);
      }

      if (!is_array($reviews) && !is_object($reviews)) {
        $reviews = [];
      }

      if ($product && $product2) {
        require_once 'views/detail.php';
      } else {
        // Nếu không tìm thấy sản phẩm  
        echo "Không tìm thấy sản phẩm .";
      }
    } else {
      // Nếu không có id được truyền  
      echo "ID not provided.";
    }
  }
}

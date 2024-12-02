<?php
class ReviewController {
    public $reviewModel;
    public $product;

    public function __construct() {
        // Khởi tạo ReviewModel
        $this->reviewModel = new ReviewModel();
        $this->product=new ProductModel();
    }

    public function review() {
        $id=$_GET['id'];
        $product=$this->product->getOne($id);
        require_once './views/review/addreview.php';
    }

    public function addReview() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $user_id = $_POST['user_id'];
            $product_id = $_POST['product_id'];
    
            // Kiểm tra xem người dùng đã viết đánh giá cho sản phẩm này chưa
            if (!$this->reviewModel->checkReview($user_id, $product_id)) {
                $rating = $_POST['rating'];
                $comment = $_POST['comment'];
    
                // Thêm đánh giá vào cơ sở dữ liệu
                $this->reviewModel->addReview($user_id, $product_id, $rating, $comment);
    
                // Chuyển hướng đến trang chi tiết sản phẩm
                header('Location: ?act=detail&id=' . $product_id);
                exit;
            } else {
                echo "Bạn đã viết đánh giá cho sản phẩm này.";
            }
        }
        require_once './views/review/addreview.php';
    }
    

    public function checkBill() {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $product_id = $_POST['product_id'];
            $hasPurchased = $this->reviewModel->checkBillDetail($user_id, $product_id);
            require_once './views/detail.php';
        }
    }
}
?>

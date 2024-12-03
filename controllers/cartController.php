<?php


class CartController {
    public $CartModel;
    public $product_model;

    public function __construct() {
        $this->CartModel = new CartModel();
        $this->product_model = new ProductModel();
    }

    public function cart() {
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $carts = $this->CartModel->getcart($id);
        } else {
            echo "Bạn chưa đăng nhập vào shop";
        }
        
    require_once './views/cart/viewCart.php';

        }
        
        

    public function addtocart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_SESSION['user_name'])) {
                $user_id = $_POST['user_id'];
                $product_id = $_POST['product_id'];
                $product_name = $_POST['product_name'];
                $product_img = $_POST['product_img'];
                $product_price = $_POST['product_price'];
                $quantity = $_POST['quantity'];
                $status = 'in_cart';

                $this->CartModel->add($user_id, $product_id, $product_name, $product_img, $product_price, $quantity, $status);

                // Redirect hoặc thông báo thành công
                echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng');</script>";
                echo "<script>window.location.href='?act=viewCart';</script>";
            } else {
                echo "<script>alert('Bạn chưa đăng nhập không thể mua hàng.');</script>";
                echo "<script>window.location.href='?act=login';</script>";
                exit;
            }
        }
    }

    public function updateCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cart_id = $_POST['cart_id'];
            $quantity = $_POST['product_quantity'];
            $product_id = $_POST['product_id'];

            // Lấy số lượng sản phẩm có sẵn từ bảng product
            $product_amount = $this->CartModel->getProductAmount($product_id);

            // Kiểm tra số lượng sản phẩm có sẵn
            if ($quantity > $product_amount) {
                echo "<script>alert('Số lượng sản phẩm không đủ.');</script>";
                echo "<script>window.location.href='?act=viewCart';</script>";
                return;
            }

            $this->CartModel->updateQuantity($cart_id, $quantity, $product_id);

            // Redirect hoặc thông báo thành công
            // echo "<script>alert('Giỏ hàng đã được cập nhật.');</script>";
            echo "<script>window.location.href='?act=viewCart';</script>";
        }
    }

    public function deleteCartItem() {
        if (isset($_GET['cart_id']) && isset($_GET['product_id'])) {
            $cart_id = $_GET['cart_id'];
            $product_id = $_GET['product_id'];

            $this->CartModel->deleteCartItem($cart_id, $product_id);

            // Redirect hoặc thông báo thành công
            echo "<script>alert('Sản phẩm đã được xóa khỏi giỏ hàng.');</script>";
            echo "<script>window.location.href='?act=viewCart';</script>";
        }
    }
    public function createOrder() {  
        // Kiểm tra nếu có yêu cầu POST từ form  
        if ($_SERVER["REQUEST_METHOD"] === "POST") {  
            // Kiểm tra xem cart_id có được gửi tới không  
            if (isset($_POST['cart_id']) && !empty($_POST['cart_id'])) {  
                $cart_id = intval($_POST['cart_id']); // Chuyển đổi sang kiểu số nguyên  

                // Gọi phương thức để thêm đơn hàng  
                $this->CartModel->addOrders($cart_id);
            } else {  
                echo "<script>alert('Cart ID không hợp lệ.');</script>";

            }  
        } else {  
            echo "<script>alert('Yêu cầu không hợp lệ.');</script>";  
        }  
        
    }  
}
?>

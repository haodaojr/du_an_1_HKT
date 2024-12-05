<?php 
class BillController {
    public $billModel;
    public $cartModel;

    public function __construct() {
        $this->billModel = new BillModel();
        $this->cartModel = new CartModel();
    }

    public function createOrder() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_products'])) {
            $selected_cart_ids = $_POST['selected_products'];

            // Lấy thông tin sản phẩm từ bảng giỏ hàng theo cart_id
            $selected_products = $this->cartModel->getCartItemsByCartIds($selected_cart_ids);

            // Tính tổng giá trị đơn hàng
            $total_price = 0;
            foreach ($selected_products as $product) {
                $total_price += $product['product_price'] * $product['quantity'];
            }

            // Lưu thông tin vào session để sử dụng ở trang đặt hàng
            $_SESSION['selected_products'] = $selected_products;
            $_SESSION['total_price'] = $total_price;
            require_once 'views/bill/add_bill.php';

            // Chuyển hướng sang trang đặt hàng
            exit;
        } else {
            echo "Không có sản phẩm nào được chọn.";
        }
    }

    public function addBill() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $billData = [
                'bill_status' => 'Đang chờ xác nhận',
                'payment_type' => $_POST['payment_type'],
                'payment_status' => 'Chưa thanh toán',
                'user_id' => $_SESSION['user_id'],
                'user_name' => $_POST['user_name'],
                'user_address' => $_POST['user_address'],
                'user_phone' => $_POST['user_phone'],
                'total' => $_POST['total_price']
            ];

            $selected_products = json_decode($_POST['selected_products'], true);

            try {
                $this->billModel->addBill($billData, $selected_products);
                echo "Đơn hàng của bạn đã được tạo thành công.";
                header("Location: ?act=viewCart");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function orderStatus() {
        $user_id = $_SESSION['user_id'];
        $orders = $this->billModel->getOrderStatus($user_id);
        require_once 'views/bill/bill_status.php';
    }
    public function billhistory(){
        $user_id = $_SESSION['user_id'];
        $orders = $this->billModel->getOrderHistory($user_id);
        require_once 'views/bill/bill_history.php';
    }

    public function cancelOrder() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bill_id'])) {
            $bill_id = $_POST['bill_id'];
            try {
                $this->billModel->cancelOrder($bill_id);
                echo "Đơn hàng đã được hủy thành công.";
                header("Location: ?act=billhistory");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function __destruct() {
        $this->billModel = null;
        $this->cartModel = null;
    }
}
?>

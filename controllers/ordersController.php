<?php
class OrdersController {
    private $ordersModel;

    public function __construct() {
        $this->ordersModel = new OrdersModel();
    }

    public function orders() {
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $orders = $this->ordersModel->getorders($id);
        } else {
            echo "Bạn chưa đăng nhập vào shop";
            return;
        }
        require_once './views/orders/OrderStatus.php';
    }

    public function cancelOrder() {
        if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
            $this->ordersModel->cancelOrder($order_id);
        } else {
            echo "<script>alert('Không tìm thấy mã đơn hàng.'); window.location.href = 'index.php?act=oderstatus';</script>";
        }
    }

    public function confirmOrder() {
        if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
            $this->ordersModel->confirmOrder($order_id);
        } else {
            echo "<script>alert('Không tìm thấy mã đơn hàng.'); window.location.href = 'index.php?act=oderstatus';</script>";
        }
    }
}
?>

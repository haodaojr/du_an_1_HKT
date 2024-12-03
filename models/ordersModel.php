<?php
class OrdersModel {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getorders($user_id) {
        try {
            $sql = "SELECT * FROM `orders` WHERE `user_id` = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function cancelOrder($order_id) {
        try {
            // Bắt đầu transaction
            $this->conn->beginTransaction();

            // Kiểm tra trạng thái đơn hàng
            $sql = "SELECT `order_status` FROM `orders` WHERE `order_id` = :order_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
            $stmt->execute();
            $order = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($order && $order['order_status'] == 'pending') {
                // Xóa đơn hàng khỏi bảng orders
                $sql = "DELETE FROM `orders` WHERE `order_id` = :order_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
                $stmt->execute();

                // Commit transaction
                $this->conn->commit();

                echo "<script>alert('Đơn hàng đã được hủy.'); window.location.href = 'index.php?act=oderstatus';</script>";
            } else {
                echo "<script>alert('Đơn hàng không thể hủy vì không ở trạng thái chờ xử lý.'); window.location.href = 'index.php?act=oderstatus';</script>";
            }
        } catch (PDOException $e) {
            // Rollback transaction nếu có lỗi
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }
    
}
?>

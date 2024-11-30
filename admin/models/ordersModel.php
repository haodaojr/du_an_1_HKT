<?php 
class ordersModel{
    public $conn;
    public function __construct(){
        $this->conn=connectDB();
    }
    public function getorders(){
        try {
            $sql="SELECT * FROM `orders` WHERE 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getordersone($order_id){
        try {
            $sql="SELECT * FROM `orders` WHERE `order_id` = '$order_id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function update($order_status,$order_id){
        try {
            $sql="UPDATE `orders` SET `order_status`='$order_status' WHERE `order_id` = '$order_id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function confirmOrder($order_id) {
        try {
            // Bắt đầu transaction
            $this->conn->beginTransaction();

            // Lấy thông tin đơn hàng
            $sql = "SELECT * FROM `orders` WHERE `order_id` = :order_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
            $stmt->execute();
            $order = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($order && $order['order_status'] == 'completed') {
                // Lấy thông tin người dùng từ session
                $user_name = $_SESSION['user_name'];
                $user_address = $_SESSION['user_address'];
                $user_phone = $_SESSION['user_phone'];

                // Chèn thông tin vào bảng bill
                $sql = "INSERT INTO `bill`(`bill_status`, `payment_type`, `payment_status`, `user_id`, `user_name`, `user_address`, `user_phone`, `total`) 
                        VALUES ('completed', :payment_type, 'paid', :user_id, :user_name, :user_address, :user_phone, :total)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':payment_type', $order['payment_type'], PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $order['user_id'], PDO::PARAM_INT);
                $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
                $stmt->bindParam(':user_address', $user_address, PDO::PARAM_STR);
                $stmt->bindParam(':user_phone', $user_phone, PDO::PARAM_STR);
                $stmt->bindParam(':total', $order['product_price'], PDO::PARAM_STR);
                $stmt->execute();
                $bill_id = $this->conn->lastInsertId();

                // Chèn thông tin vào bảng bill_detail
                $sql = "INSERT INTO `bill_detail`(`bill_id`, `product_id`, `product_price`, `product_price_sale`, `product_name`, `quantity`, `product_img`) 
                        VALUES (:bill_id, :product_id, :product_price, :product_price_sale, :product_name, :quantity, :product_img)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':bill_id', $bill_id, PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $order['product_id'], PDO::PARAM_INT);
                $stmt->bindParam(':product_price', $order['product_price'], PDO::PARAM_STR);
                $stmt->bindParam(':product_price_sale', $order['product_price_sale'], PDO::PARAM_STR);
                $stmt->bindParam(':product_name', $order['product_name'], PDO::PARAM_STR);
                $stmt->bindParam(':quantity', $order['quantity'], PDO::PARAM_INT);
                $stmt->bindParam(':product_img', $order['product_img'], PDO::PARAM_STR);
                $stmt->execute();

                // Chèn thông tin vào bảng bill_history
                

                // Cập nhật số lượng sản phẩm trong bảng product
                $sql = "UPDATE `product` SET `product_amount` = `product_amount` - :quantity WHERE `product_id` = :product_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':quantity', $order['quantity'], PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $order['product_id'], PDO::PARAM_INT);
                $stmt->execute();
                
                // Xóa đơn hàng khỏi bảng orders
                $sql = "DELETE FROM `orders` WHERE `order_id` = :order_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
                $stmt->execute();

                // Commit transaction
                $this->conn->commit();

                echo "<script>alert('Đơn hàng đã được xác nhận.'); window.location.href = '?act=list_orders';</script>";
            } else {
                echo "<script>alert('Đơn hàng không thể xác nhận vì không ở trạng thái hoàn tất.'); window.location.href = '?act=list_orders';</script>";
            }
        } catch (PDOException $e) {
            // Rollback transaction nếu có lỗi
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
<?php
class CartModel {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getcart($user_id) {
        try {
            $sql = "SELECT * FROM `cart` WHERE `user_id` = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function add($user_id, $product_id, $product_name, $product_img, $product_price, $quantity, $status) {
        try {
            // Bắt đầu transaction
            $this->conn->beginTransaction();

            // Thêm sản phẩm vào giỏ hàng
            $sql = "INSERT INTO `cart`(`user_id`, `product_id`, `product_name`, `product_img`, `product_price`, `quantity`, `status`)
                    VALUES (:user_id, :product_id, :product_name, :product_img, :product_price, :quantity, :status)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_img', $product_img, PDO::PARAM_STR);
            $stmt->bindParam(':product_price', $product_price, PDO::PARAM_STR);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->execute();

            // Cập nhật số lượng sản phẩm trong bảng product
            $sql = "UPDATE `product` SET `product_amount` = `product_amount` - :quantity WHERE `product_id` = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();

            // Commit transaction
            $this->conn->commit();

            echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng và cập nhật số lượng sản phẩm.');</script>";
        } catch (PDOException $e) {
            // Rollback transaction nếu có lỗi
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateQuantity($cart_id, $quantity, $product_id) {
        try {
            // Bắt đầu transaction
            $this->conn->beginTransaction();

            // Lấy số lượng hiện tại của sản phẩm trong giỏ hàng
            $sql = "SELECT `quantity` FROM `cart` WHERE `cart_id` = :cart_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
            $stmt->execute();
            $current_quantity = $stmt->fetch(PDO::FETCH_ASSOC)['quantity'];

            // Tính toán sự thay đổi số lượng
            $quantity_difference = $quantity - $current_quantity;

            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $sql = "UPDATE `cart` SET `quantity` = :quantity WHERE `cart_id` = :cart_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
            $stmt->execute();

            // Cập nhật số lượng sản phẩm trong bảng product
            $sql = "UPDATE `product` SET `product_amount` = `product_amount` - :quantity_difference WHERE `product_id` = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':quantity_difference', $quantity_difference, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();

            // Commit transaction
            $this->conn->commit();

            echo "<script>alert('Số lượng sản phẩm đã được cập nhật.');</script>";
        } catch (PDOException $e) {
            // Rollback transaction nếu có lỗi
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteCartItem($cart_id, $product_id) {
        try {
            // Bắt đầu transaction
            $this->conn->beginTransaction();

            // Lấy số lượng hiện tại của sản phẩm trong giỏ hàng
            $sql = "SELECT `quantity` FROM `cart` WHERE `cart_id` = :cart_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
            $stmt->execute();
            $current_quantity = $stmt->fetch(PDO::FETCH_ASSOC)['quantity'];

            // Xóa sản phẩm khỏi giỏ hàng
            $sql = "DELETE FROM `cart` WHERE `cart_id` = :cart_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
            $stmt->execute();

            // Cập nhật số lượng sản phẩm trong bảng product
            $sql = "UPDATE `product` SET `product_amount` = `product_amount` + :current_quantity WHERE `product_id` = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':current_quantity', $current_quantity, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();

            // Commit transaction
            $this->conn->commit();

            echo "<script>alert('Sản phẩm đã được xóa khỏi giỏ hàng và cập nhật số lượng sản phẩm.');</script>";
        } catch (PDOException $e) {
            // Rollback transaction nếu có lỗi
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }

    public function getProductAmount($product_id) {
        try {
            $sql = "SELECT `product_amount` FROM `product` WHERE `product_id` = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Kiểm tra xem kết quả có hợp lệ không
            if (!$result) {
                return 0; // Hoặc giá trị mặc định khác
            }

            return $result['product_amount'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

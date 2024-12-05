<?php
class CartModel {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getCart($user_id) {
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

            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            $sql = "SELECT `cart_id`, `quantity` FROM `cart` WHERE `user_id` = :user_id AND `product_id` = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Nếu sản phẩm đã tồn tại, cập nhật số lượng
                $new_quantity = $result['quantity'] + $quantity;
                $sql = "UPDATE `cart` SET `quantity` = :quantity WHERE `cart_id` = :cart_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':quantity', $new_quantity, PDO::PARAM_INT);
                $stmt->bindParam(':cart_id', $result['cart_id'], PDO::PARAM_INT);
                $stmt->execute();
            } else {
                // Nếu sản phẩm chưa tồn tại, thêm sản phẩm vào giỏ hàng
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
            }

            // Commit transaction
            $this->conn->commit();

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
    
            // Lấy số lượng hiện tại của sản phẩm trong bảng product
            $sql = "SELECT `product_amount` FROM `product` WHERE `product_id` = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            $product_amount = $stmt->fetch(PDO::FETCH_ASSOC)['product_amount'];
    
            // Kiểm tra nếu số lượng yêu cầu lớn hơn số lượng hiện có trong bảng product
            if ($quantity > $product_amount) {
                echo "<script>alert('Số lượng yêu cầu vượt quá số lượng sản phẩm hiện có.');</script>";
                $this->conn->rollBack();
                return;
            }
    
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $sql = "UPDATE `cart` SET `quantity` = :quantity WHERE `cart_id` = :cart_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
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

            // Xóa sản phẩm khỏi giỏ hàng
            $sql = "DELETE FROM `cart` WHERE `cart_id` = :cart_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
            $stmt->execute();

            // Commit transaction
            $this->conn->commit();

            echo "<script>alert('Sản phẩm đã được xóa khỏi giỏ hàng.');</script>";
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

    public function getCartItemsByCartIds($cart_ids) {
        try {
            // Lấy thông tin sản phẩm từ bảng giỏ hàng theo danh sách cart_id
            $placeholders = implode(',', array_fill(0, count($cart_ids), '?'));
            $sql = "SELECT * FROM `cart` WHERE `cart_id` IN ($placeholders)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($cart_ids);
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    public function __destruct() {
        $this->conn = null;
    }
}

?>

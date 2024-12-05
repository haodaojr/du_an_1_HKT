<?php
class BillModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addBill($billData, $selectedProducts)
    {
        try {
            $this->conn->beginTransaction();

            // Insert into `bill` table
            $sqlBill = "INSERT INTO `bill` (`bill_status`, `payment_type`, `payment_status`, `user_id`, `user_name`, `user_address`, `user_phone`, `total`) 
                        VALUES (:bill_status, :payment_type, :payment_status, :user_id, :user_name, :user_address, :user_phone, :total)";
            $stmtBill = $this->conn->prepare($sqlBill);
            $stmtBill->execute([
                ':bill_status' => $billData['bill_status'],
                ':payment_type' => $billData['payment_type'],
                ':payment_status' => $billData['payment_status'],
                ':user_id' => $billData['user_id'],
                ':user_name' => $billData['user_name'],
                ':user_address' => $billData['user_address'],
                ':user_phone' => $billData['user_phone'],
                ':total' => $billData['total']
            ]);

            // Get the last inserted bill_id
            $bill_id = $this->conn->lastInsertId();

            // Insert into `bill_detail` table
            $sqlBillDetail = "INSERT INTO `bill_detail` (`bill_id`, `product_id`, `product_name`, `product_price`, `product_price_sale`, `quantity`, `product_img`) 
                              VALUES (:bill_id, :product_id, :product_name, :product_price, :product_price_sale, :quantity, :product_img)";
            $stmtBillDetail = $this->conn->prepare($sqlBillDetail);

            foreach ($selectedProducts as $product) {
                $stmtBillDetail->execute([
                    ':bill_id' => $bill_id,
                    ':product_id' => $product['product_id'],
                    ':product_name' => $product['product_name'],
                    ':product_price' => $product['product_price'],
                    ':product_price_sale' => 0,
                    ':quantity' => $product['quantity'],
                    ':product_img' => $product['product_img']
                ]);
            }

            // Delete items from cart
            $placeholders = implode(',', array_fill(0, count($selectedProducts), '?'));
            $sqlDeleteCart = "DELETE FROM `cart` WHERE `cart_id` IN ($placeholders)";
            $stmtDeleteCart = $this->conn->prepare($sqlDeleteCart);
            $cart_ids = array_column($selectedProducts, 'cart_id');
            $stmtDeleteCart->execute($cart_ids);

            // Commit the transaction
            $this->conn->commit();

            return true;
        } catch (PDOException $e) {
            // Rollback the transaction if something failed
            $this->conn->rollBack();
            throw new Exception("Error: " . $e->getMessage());
        }
    }
    public function getOrderStatus($user_id) {
        try {
            $sql = "SELECT b.bill_id, b.bill_status, b.payment_type, b.total, bd.product_name, bd.product_price, bd.quantity, bd.product_img 
                    FROM bill b 
                    LEFT JOIN bill_detail bd ON b.bill_id = bd.bill_id 
                    WHERE b.user_id = :user_id AND b.bill_status NOT IN ('Hủy đơn', 'Đã thanh toán')";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':user_id' => $user_id]);
    
            $orders = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $bill_id = $row['bill_id'];
                if (!isset($orders[$bill_id])) {
                    $orders[$bill_id] = [
                        'bill_id' => $row['bill_id'],
                        'bill_status' => $row['bill_status'],
                        'payment_type' => $row['payment_type'],
                        'total' => $row['total'],
                        'products' => []
                    ];
                }
                if ($row['product_name']) {
                    $orders[$bill_id]['products'][] = [
                        'product_name' => $row['product_name'],
                        'product_price' => $row['product_price'],
                        'quantity' => $row['quantity'],
                        'product_img' => $row['product_img']
                    ];
                }
            }
    
            return $orders;
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }
    
    public function getOrderHistory($user_id) {
        try {
            $sql = "SELECT b.bill_id, b.bill_status, b.payment_type, b.total, bd.product_name, bd.product_price, bd.quantity, bd.product_img 
                    FROM bill b 
                    LEFT JOIN bill_detail bd ON b.bill_id = bd.bill_id 
                    WHERE b.user_id = :user_id AND b.bill_status IN ('Hủy đơn', 'Đã thanh toán')";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':user_id' => $user_id]);
    
            $orders = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $bill_id = $row['bill_id'];
                if (!isset($orders[$bill_id])) {
                    $orders[$bill_id] = [
                        'bill_id' => $row['bill_id'],
                        'bill_status' => $row['bill_status'],
                        'payment_type' => $row['payment_type'],
                        'total' => $row['total'],
                        'products' => []
                    ];
                }
                if ($row['product_name']) {
                    $orders[$bill_id]['products'][] = [
                        'product_name' => $row['product_name'],
                        'product_price' => $row['product_price'],
                        'quantity' => $row['quantity'],
                        'product_img' => $row['product_img']
                    ];
                }
            }
    
            return $orders;
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }
    
    public function cancelOrder($bill_id)
    {
        try {
            $sql = "UPDATE  bill SET bill_status = 'Hủy đơn' WHERE bill_id = :bill_id AND bill_status = 'Đang chờ xác nhận'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':bill_id' => $bill_id]);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                throw new Exception("Không thể hủy đơn hàng. Đơn hàng không ở trạng thái 'Đang chờ xác nhận'.");
            }
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }
}

<?php
class billModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getBills()
    {
        try {
            $sql = "SELECT bill_id, bill_status, payment_type, payment_status, user_id, user_name, user_address, user_phone, total 
                    FROM bill 
                    ORDER BY bill_id ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getBillById($bill_id)
    {
        try {
            $sql = "SELECT * FROM `bill` WHERE `bill_id` = :bill_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':bill_id', $bill_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateBillStatus($bill_status, $bill_id, $payment_status)
    {
        try {
            $sql = "UPDATE `bill` SET `bill_status` = :bill_status, `payment_status` = :payment_status WHERE `bill_id` = :bill_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':bill_status', $bill_status, PDO::PARAM_STR);
            $stmt->bindParam(':payment_status', $payment_status, PDO::PARAM_STR);
            $stmt->bindParam(':bill_id', $bill_id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateProductQuantities($bill_id)
    {
        try {
            $sql = "SELECT product_id, quantity FROM bill_detail WHERE bill_id = :bill_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':bill_id', $bill_id, PDO::PARAM_INT);
            $stmt->execute();
            $bill_details = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($bill_details as $detail) {
                $sql = "UPDATE product SET product_amount = product_amount - :quantity WHERE product_id = :product_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':quantity', $detail['quantity'], PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $detail['product_id'], PDO::PARAM_INT);
                $stmt->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getBillDetails($bill_id)
    {
        try {
            $sql = "SELECT bd.*, p.product_name FROM bill_detail bd JOIN product p ON bd.product_id = p.product_id WHERE bd.bill_id = :bill_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':bill_id', $bill_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

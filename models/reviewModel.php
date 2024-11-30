<?php
class ReviewModel {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getReviewsByProductId($product_id) {
        try {
            // Truy vấn kết hợp bảng review và bảng user
            $sql = "
                SELECT 
                    r.*, 
                    u.user_name 
                FROM 
                    `review` AS r
                JOIN 
                    `user` AS u
                ON 
                    r.user_id = u.user_id
                WHERE 
                    r.product_id = :product_id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về kết quả dưới dạng mảng kết hợp
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }

    public function addReview($user_id, $product_id, $rating, $comment) {
        try {
            $sql = "INSERT INTO `review` (`user_id`, `product_id`, `rating`, `comment`, `created_at`) VALUES (:user_id, :product_id, :rating, :comment, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }

    public function checkBillDetail($user_id, $product_id) {
        try {
            $sql = "SELECT COUNT(*) 
                    FROM `bill` AS b 
                    JOIN `bill_detail` AS bd ON b.bill_id = bd.bill_id 
                    WHERE b.user_id = :user_id AND bd.product_id = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }

    public function checkReview($user_id, $product_id) {
        try {
            $sql = "SELECT COUNT(*) FROM `review` WHERE user_id = :user_id AND product_id = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }
    
}

?>

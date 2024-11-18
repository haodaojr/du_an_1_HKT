<?php
class CategoryModels {
    public $conn;

    function __construct() {
        $this->conn = connectDB(); // Đảm bảo rằng connectDB() trả về một kết nối PDO hợp lệ.
    }

    function Allcate() {
        try {
            $sql = "SELECT * FROM category";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); 
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; 
        }
    }

    function insertcate($product_category_name,$product_category_img) {
        try {
            $sql = "INSERT INTO category (product_category_name,product_category_img) VALUES (:product_category_name,:product_category_img)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_category_name', $product_category_name);
            $stmt->bindParam(':product_category_img', $product_category_img);
            return $stmt->execute(); 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); 
            return false;
        }
    }

    function findid($product_category_id) {
        try {
            $sql = "SELECT * FROM category WHERE product_category_id = :product_category_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_category_id', $product_category_id); 
            $stmt->execute(); 
            return $stmt->fetch(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; 
        }
    }

    function deletecate($product_category_id) {
        try {
            $sql = "DELETE FROM `category` WHERE product_category_id = :product_category_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_category_id', $product_category_id);
            $result = $stmt->execute();
            if ($result) {
                return true; // Thành công
            } else {
                echo "Không thể xóa danh mục.";
                return false; // Thất bại
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function updatecate($product_category_id, $product_category_name, $product_category_img) {
        try {
            $sql = "UPDATE category SET product_category_name = :product_category_name , product_category_img = :product_category_img WHERE product_category_id = :product_category_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_category_name', $product_category_name); 
            $stmt->bindParam(':product_category_id', $product_category_id); 
            $stmt->bindParam(':product_category_img', $product_category_img); 
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
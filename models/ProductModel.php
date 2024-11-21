<?php 
class ProductModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAll(){
        try {
            $sql = "SELECT * FROM `product`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getOne($id){
        try {
            $sql = "SELECT p.*, c.product_category_name  
            FROM product p  
            JOIN category c ON p.category_id = c.product_category_id  
            WHERE p.product_id =  $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getcate($id){  
        try {  
            // Sử dụng dấu ngoặc đơn đóng trong câu lệnh SQL  
            $sql = "SELECT p.*, c.product_category_name  
                FROM product p  
                JOIN category c ON p.category_id = c.product_category_id  
                WHERE p.category_id = (SELECT category_id FROM product WHERE product_id = $id)  
                AND p.product_price BETWEEN   
                    (SELECT (product_price - 10) FROM product WHERE product_id = $id)   
                    AND   
                    (SELECT (product_price + 10) FROM product WHERE product_id = $id)  
                LIMIT 4;";  
            $stmt = $this->conn->prepare($sql);  
            $stmt->execute();  
            return $stmt->fetchAll();  
        } catch (PDOException $e) {  
            echo "Error: " . $e->getMessage();  
        }  
    }
    public function getThere(){
        try {
            $sql = "SELECT * FROM `product` WHERE 1 LIMIT 3";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
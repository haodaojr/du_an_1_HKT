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
            $sql = "SELECT * FROM `product` 
            ORDER BY `category_id`=3 DESC 
            LIMIT 3;
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function search($category_id){
        try {
            $sql="SELECT * FROM `product` WHERE category_id=$category_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
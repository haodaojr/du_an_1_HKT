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
    public function getnew() {
        try {
            $sql = "
                SELECT p.*, COUNT(bd.product_id) AS sold_count 
                FROM product p
                INNER JOIN bill_detail bd ON p.product_id = bd.product_id
                GROUP BY p.product_id
                HAVING COUNT(bd.product_id) >= 2
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
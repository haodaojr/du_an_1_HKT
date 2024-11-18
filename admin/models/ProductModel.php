<?php 
class ProductModel {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }
    public function __destruct(){
        $this->conn=null;
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM `product`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getCategory(){
        try {
            $sql="SELECT * FROM `category` ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function getOne($id) {
        try {
            $sql = "SELECT * FROM `product` p JOIN category c ON p.category_id = c.product_category_id WHERE p.product_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insert($product_name, $category_id, $product_img, $product_price, $product_amount, $product_description) {
        try {
            $sql = "INSERT INTO `product` (`product_name`, `category_id`, `product_img`, `product_price`, `product_amount`, `product_description`) VALUES (:product_name, :category_id, :product_img, :product_price, :product_amount, :product_description)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_name', $product_name);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':product_img', $product_img);
            $stmt->bindParam(':product_price', $product_price);
            $stmt->bindParam(':product_amount', $product_amount);
            $stmt->bindParam(':product_description', $product_description);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($product_id, $product_name, $category_id, $product_img, $product_price, $product_amount, $product_description) {
        try {
            $sql = "UPDATE `product` SET `product_name` = :product_name, `category_id` = :category_id, `product_img` = :product_img, `product_price` = :product_price, `product_amount` = :product_amount, `product_description` = :product_description WHERE `product_id` = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':product_name', $product_name);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':product_img', $product_img);
            $stmt->bindParam(':product_price', $product_price);
            $stmt->bindParam(':product_amount', $product_amount);
            $stmt->bindParam(':product_description', $product_description);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function delete($id) {
        try {
            $sql = "DELETE FROM `product` WHERE product_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

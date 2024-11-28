<?php 
class ordersModel{
    public $conn;
    public function __construct(){
        $this->conn=connectDB();
    }
    public function getorders(){
        try {
            $sql="SELECT * FROM `orders` WHERE 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getordersone($order_id){
        try {
            $sql="SELECT * FROM `orders` WHERE `order_id` = '$order_id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function update($order_status,$order_id){
        try {
            $sql="UPDATE `orders` SET `order_status`='$order_status' WHERE `order_id` = '$order_id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
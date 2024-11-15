<?php 
class ProductModel{
    public $conn;
    public function __construct(){
        $this ->conn = connectDB();
    }
    public function getAll(){
        try {
            $sql="SELECT * FROM `product`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function getOne($id){
        try {
            $sql="SELECT * FROM `product` WHERE product_id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        return $stmt->fetch();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function insert($product_name,$category_id,$product_img,$product_price,$product_amount,$product_description){
        try {
            $sql="INSERT INTO `product`( `product_name`, `category_id`, `product_img`, `product_price`, `product_amount`, `product_description`) VALUES ('$product_name','$category_id','$product_img','$product_price','$product_amount','$product_description')";
            $stmt =$this->conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function update($product_id,$product_name,$category_id,$product_img,$product_price,$product_amount,$product_description){
        try {
            $sql="UPDATE `product` SET `product_name`='$product_name',`category_id`='$category_id',`product_img`='$product_img',`product_price`='$product_price',`product_amount`='$product_amount',`product_description`='$product_description' WHERE `product_id`='$product_id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function detele ($id){
        try {
            $sql="DELETE FROM `product` WHERE product_id=$id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
}
?>
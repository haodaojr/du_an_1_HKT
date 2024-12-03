<?php 
    class ReviewModels{
        public $conn;
        function __construct(){
            $this -> conn = connectDB();
        }

        public function ReviewAll(){
            try {
                $sql = "SELECT review.*, user.user_name , product.product_name
                FROM review
                JOIN user on review.user_id = user.user_id
                JOIN product on review.product_id = product.product_id
                 ";
                $stmt =  $this -> conn -> prepare($sql);
                $stmt -> execute();
                return $stmt -> fetchAll();
            } catch (PDOException $e) {
                echo "$e";
            }
        }

        public function delete($id) {
            try {
                $sql = "DELETE FROM `review` WHERE review_id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }


    }
?>
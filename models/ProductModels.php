<?php
//  public $conn;
class ProductMOdels
{
    public $conn;
    function __construct()
    {
        $this->conn = connectDB();
    }

    function ShowAll()
    {
        try {
            $sql = "SELECT * FROM `product`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng kết hợp để dễ sử dụng
        } catch (\Throwable $th) {
        }
    }

    function ShowAnother()
    {
        try {
            $sql = "SELECT * FROM `product`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Log the results for debugging
            error_log("Fetched Products: " . print_r($results, true)); // Log fetched products
    
            return $results; // Return the results
        } catch (\Throwable $th) {
            error_log("Error fetching products: " . $th->getMessage());
            return []; // Return an empty array on error
        }
    }


    function Pro_Detail($product_id)
    {
        try {
            $sql = "SELECT * FROM `product` WHERE product_id = :product_id"; // Đảm bảo tên cột chính xác
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            return $stmt->fetch(); // Trả về một sản phẩm hoặc null
        } catch (\Throwable $th) {
            return null; // Đảm bảo trả về null nếu có lỗi
        }
    }

    // function

}
?>
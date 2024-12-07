<?php
class SearchModels {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function search($keyword = '', $category_id = 0) {
        try {
            $sql = "SELECT p.*, c.product_category_name 
                    FROM `product` p 
                    JOIN `category` c ON p.category_id = c.product_category_id 
                    WHERE p.product_name LIKE :keyword";

            // Filter by category if specified
            if ($category_id > 0) {
                $sql .= " AND p.category_id = :category_id";
            }

            $stmt = $this->conn->prepare($sql);
            $params = ['keyword' => '%' . $keyword . '%'];

            if ($category_id > 0) {
                $params['category_id'] = $category_id;
            }

            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getCategories() {
        try {
            $sql = "SELECT * FROM `category`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Ensure you fetch the results as an associative array
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return []; // Return an empty array on error
        }
    }
}
?>
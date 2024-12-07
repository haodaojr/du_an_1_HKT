<?php
class SearchControllers {
    public $SearchModels;

    public function __construct() {
        $this->SearchModels = new SearchModels();
    }

    public function search_product() {
        $products = [];
        $categories = $this->SearchModels->getCategories(); 
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $search = $_POST['search'] ?? ''; 
            $category_id = $_POST['category_id'] ?? 0; 
            $products = $this->SearchModels->search($search, $category_id); 
        } else {
            $products = $this->SearchModels->search(); 
        }
        require_once 'views/search.php';
    }
}
?>
<?php 
    class ProductController{
        public $ProductMOdels;
        function __construct(){
            $this -> ProductMOdels = new ProductMOdels();
        }

        function ShowAll(){
            $product = $this -> ProductMOdels -> ShowAll();
            require_once 'views/home.php';
        }
    }
?>
<?php 
class ProductController{
public $ProductModel;
public function __construct(){
    $this->ProductModel= new ProductModel();
}
}
?>
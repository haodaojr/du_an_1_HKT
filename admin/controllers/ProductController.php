<?php 
class ProductController{
public $ProductModel;
public function __construct(){
    $this->ProductModel= new ProductModel();
}
public function productAll(){
    $products=$this->ProductModel->getAll();
    require_once 'views/products/list_product.php';
}
public function delete(){
    $id=$_POST['product_id'];
    $this->ProductModel->detele($id);
    header('location:?act=list_product');
}
}
?>
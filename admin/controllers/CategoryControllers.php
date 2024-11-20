<?php
 require_once 'models/CategoryModels.php';
 class CategoryControllers{
    public $CategoryModels;
    function __construct(){
        $this-> CategoryModels = new CategoryModels();
    }

    function Allcate(){
        $Allcate = $this->CategoryModels->Allcate();
        require_once 'views/category/list.php';
    }

    function insertcate(){
        if(isset($_POST['insert'])){
            $product_category_name = $_POST['product_category_name'];

            $product_category_img = $_FILES['product_category_img']['name'];
            $tmp = $_FILES['product_category_img']['tmp_name'];
            move_uploaded_file($tmp, "/upload/img/" . $product_category_img);
            if($this->CategoryModels->insertcate($product_category_name,$product_category_img)){
                header("Location:?act=list_cate");
                exit; 
            }else{
                echo "Error";
                return; 
            }
        }
        
        require_once 'views/category/insert.php'; 
    }

    function deletecate() {
    $product_category_id = $_POST['product_category_id'] ?? null; // Lấy ID từ POST
    if ($product_category_id) {
        if ($this->CategoryModels->deletecate($product_category_id)) {
            header("Location: ?act=list_cate");
            exit; 
        } else {
            echo "<script> 
                    alert('Danh mục này đang được sử dụng và không thể xóa');
                    window.location.href = '?act=list_cate'; 
                </script>";
            exit;
            
        }
    } else {
        echo "<script> alert('Danh mục này đang được sử dụng và không thể xóa'); </script>";
        
        
    }
}


    function updatecate($product_category_id) {
        $onecate = $this->CategoryModels->findid($product_category_id);
        if ($onecate === false) {
            echo "Danh mục không tồn tại.";
            return; 
        }
        if (isset($_POST['update'])) {
            $product_category_name = $_POST['product_category_name'];
            if(empty($_FILES['product_category_img']['name'])){
                $img="";
            }else{
                $product_category_img=$_FILES['product_category_img']['name'];
                $tmp=$_FILES['product_category_img']['tmp_name'];
                move_uploaded_file($tmp,"./upload/img" .$product_category_img);
            } 
            if ($this->CategoryModels->updatecate($product_category_id,$product_category_name,$product_category_img)) { // Truyền tên
                header("Location: ?act=list_cate");
                exit; 
            } else {
                echo "Lỗi khi cập nhật danh mục.";
            }
        }
    
        require_once 'views/category/update.php';
    }
 }
?>
<?php 
class ProductController {
    public $ProductModel;

    public function __construct() {
        $this->ProductModel = new ProductModel();
    }
    public function __destruct(){
        $this->ProductModel=null;
    }

    public function productAll() {
        $products = $this->ProductModel->getAll();
        require_once 'views/products/list_product.php';
    }

    public function addProduct() {
        $categorys=$this->ProductModel->getCategory();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
            // Lấy dữ liệu từ form  
            $productName = trim($_POST['product_name']);  
            $categoryId = (int) $_POST['category_id'];  
            $productImg = $_FILES['product_img']['name'];  
            $tmp = $_FILES['product_img']['tmp_name'];  
            $productPrice = (float) $_POST['product_price'];  
            $productAmount = (int) $_POST['product_amount'];  
            $productDescription = trim($_POST['product_description']);  
    
            // Mảng để lưu trữ các lỗi xác thực  
            $errors = [];  
    
            // Xác thực dữ liệu  
            if (empty($productName)) {  
                $errors['product_name'] = 'Tên sản phẩm không được để trống.';  
            }  
            if ($categoryId <= 0) {  
                $errors['category_id'] = 'Chọn danh mục sản phẩm hợp lệ.';  
            }  
            if (empty($productImg)) {  
                $errors['product_img'] = 'Hình ảnh sản phẩm không được để trống.';  
            }  
            if ($productPrice <= 0) {  
                $errors['product_price'] = 'Giá sản phẩm phải lớn hơn 0.';  
            }  
            if ($productAmount < 0) {  
                $errors['product_amount'] = 'Số lượng sản phẩm không được âm.';  
            }  
            if (empty($productDescription)) {  
                $errors['product_description'] = 'Mô tả sản phẩm không được để trống.';  
            }  
    
            // Nếu không có lỗi, tiến hành thêm sản phẩm  
            if (empty($errors)) {  
                // Kiểm tra và di chuyển hình ảnh  
                if (move_uploaded_file($tmp, './uploads/img/' . $productImg)) {  
                    // Thêm sản phẩm vào cơ sở dữ liệu  
                    $this->ProductModel->insert($productName, $categoryId, $productImg, $productPrice, $productAmount, $productDescription);  
                    
                    // Chuyển hướng đến trang danh sách sản phẩm  
                    header('Location: ?act=list_product');  
                    exit(); // Đảm bảo không có mã nào khác được thực thi sau lệnh header  
                } else {  
                    $errors['product_img'] = 'Không thể tải lên hình ảnh. Vui lòng thử lại.'; // Thông báo lỗi khi di chuyển tệp không thành công  
                }  
            } else {  
                // Lưu các lỗi vào session để hiển thị trên trang add_product.php  
                $_SESSION['errors'] = $errors;  
            }  
        }  
    
        // Hiển thị trang thêm sản phẩm  
        require_once 'views/products/add_product.php';  
    }
    public function editProduct() {
       
        $categorys=$this->ProductModel->getCategory();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
            // Lấy dữ liệu từ form
            $productId = trim($_POST['product_id']);  
            $productName = trim($_POST['product_name']);  
            $categoryId = (int) $_POST['category_id'];  
            $productImg = isset($_FILES['product_img2']['name']) ? $_FILES['product_img2']['name'] : '';  // Kiểm tra xem có tệp ảnh mới không
            $tmp = isset($_FILES['product_img2']['tmp_name']) ? $_FILES['product_img2']['tmp_name'] : '';  // Tên tạm thời của ảnh
            $productPrice = (float) $_POST['product_price'];  
            $productAmount = (int) $_POST['product_amount'];  
            $productDescription = trim($_POST['product_description']);  
    
            // Nếu không có ảnh mới (người dùng không chọn ảnh mới), giữ ảnh cũ từ DB
            if (empty($productImg)) {
                $productImg = $_POST['product_img']; // Sử dụng ảnh cũ từ DB
            }
    
            // Mảng để lưu trữ các lỗi xác thực
            $errors = [];  
    
            // Xác thực dữ liệu
            if (empty($productName)) {  
                $errors['product_name'] = 'Tên sản phẩm không được để trống.';  
            }  
            if ($categoryId <= 0) {  
                $errors['category_id'] = 'Chọn danh mục sản phẩm hợp lệ.';  
            }  
            if ($productPrice <= 0) {  
                $errors['product_price'] = 'Giá sản phẩm phải lớn hơn 0.';  
            }  
            if ($productAmount < 0) {  
                $errors['product_amount'] = 'Số lượng sản phẩm không được âm.';  
            }  
            if (empty($productDescription)) {  
                $errors['product_description'] = 'Mô tả sản phẩm không được để trống.';  
            }
    
            // Nếu không có lỗi, tiến hành cập nhật sản phẩm
            if (empty($errors)) {  
                // Nếu người dùng tải ảnh mới lên, tiến hành di chuyển tệp
                if (!empty($productImg) && !empty($tmp)) {  
                    if (move_uploaded_file($tmp, './uploads/img/' . $productImg)) {  
                        // Cập nhật sản phẩm vào cơ sở dữ liệu với ảnh mới
                        $this->ProductModel->update($productId, $productName, $categoryId, $productImg, $productPrice, $productAmount, $productDescription);  
                        
                        // Chuyển hướng đến trang danh sách sản phẩm  
                        header('Location: ?act=list_product');  
                        exit(); // Đảm bảo không có mã nào khác được thực thi sau lệnh header
                    } else {  
                        $errors['product_img'] = 'Không thể tải lên hình ảnh. Vui lòng thử lại.'; // Thông báo lỗi khi di chuyển tệp không thành công  
                    }  
                } else {
                    // Nếu không tải ảnh mới, chỉ cập nhật các trường còn lại
                    $this->ProductModel->update($productId, $productName, $categoryId, $productImg, $productPrice, $productAmount, $productDescription);  
                    
                    // Chuyển hướng đến trang danh sách sản phẩm
                    header('Location: ?act=list_product');  
                    exit(); // Đảm bảo không có mã nào khác được thực thi sau lệnh header
                }
            } else {  
                // Lưu các lỗi vào session để hiển thị trên trang sửa sản phẩm
                $_SESSION['errors'] = $errors;  
            }  
        }
        $id = $_GET['product_id']; // Lấy id sản phẩm từ URL
        $product = $this->ProductModel->getOne($id); // Lấy thông tin sản phẩm từ DB
        require_once 'views/products/edit_product.php'; // Hiển thị form sửa sản phẩm
    }
    

    public function delete() {
        $id = $_POST['product_id'];
        $this->ProductModel->delete($id);
        header('Location:?act=list_product');
        exit(); // Thêm exit() để đảm bảo không có mã nào khác được thực thi sau lệnh header
    }
}
?>

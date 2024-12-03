<?php
    class ReviewControllers{
        public $ReviewModels;
        function __construct(){
            $this->ReviewModels = new ReviewModels();
        }

        function ReviewAll(){
            $Review = $this->ReviewModels->ReviewAll();
            require_once 'views/review/list_review.php';
        }

        public function delete() {
            $id = $_POST['review_id'];
            $this->ReviewModels->delete($id);
            header('Location:?act=list_review');
            exit(); // Thêm exit() để đảm bảo không có mã nào khác được thực thi sau lệnh header
        }
    }
?>
<?php 
class OrdersController{
    public $orderModel;
    public function __construct(){
        $this->orderModel=new ordersModel();
    }
    public function getall(){
        $orders=$this->orderModel->getorders();
        require_once 'views/orders/allOrder.php';
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $order_id=$_POST['order_id'];
            $order_status=$_POST['order_status'];
            $this->orderModel->update($order_status, $order_id);
            header('Location: ?act=list_orders');  
        }
        $id=$_GET['order_id'];
        $order=$this->orderModel->getordersone($id);
        require_once 'views/orders/editOrder.php';

    }
}
?>
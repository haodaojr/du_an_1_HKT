<?php
class BillController
{
    public $billModel;

    public function __construct()
    {
        $this->billModel = new billModel();
    }

    public function getAll()
    {
        $bills = $this->billModel->getBills();
        require_once 'views/bill/all_bill.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bill_id = $_POST['bill_id'];
            $bill_status = $_POST['bill_status'];
            $payment_status = $_POST['payment_status'];

            // Check if bill_status is "Đã thanh toán" and set payment_status accordingly
            if ($bill_status == 'Đã thanh toán') {
                $payment_status = 'Đã thanh toán';
                $this->billModel->updateProductQuantities($bill_id);
            }

            $this->billModel->updateBillStatus($bill_status, $bill_id, $payment_status);
            header('Location: ?act=list_bill');
        }
        $id = $_GET['bill_id'];
        $bill = $this->billModel->getBillById($id);
        require_once 'views/bill/edit_bill.php';
    }
    public function showBillDetails()
    {
        $bill_id=$_GET['bill_id'];
        $bill_details = $this->billModel->getBillDetails($bill_id);
        require_once './views/bill/detail_bill.php';
    }
}

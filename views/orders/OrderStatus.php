<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Order Status</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php require_once 'views/layouts/link.php'; ?>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <?php require_once 'views/layouts/siderbar.php'; ?>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Order Status</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Order Status</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Orders Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <?php
            if (empty($orders)) {
                echo "<div class='alert alert-info'>Bạn chưa có đơn hàng nào.</div>";
            } else {
            ?>
                <h2 class="mb-4">Đơn hàng của bạn</h2>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) { ?>
                            <tr>
                                <td><?= $order['order_id'] ?></td>
                                <td><?= $order['product_name'] ?></td>
                                <td><img src="admin/uploads/img/<?= $order['product_img'] ?>" alt="Product Image" style="width: 50px; height: 50px;"></td>
                                <td><?= number_format($order['product_price'], 0, ',', '.') ?> VNĐ</td>
                                <td><?= $order['quantity'] ?></td>
                                <td><?= $order['order_status'] ?></td>
                                <td><?= $order['payment_type'] ?></td>
                                <td><?= $order['created_at'] ?></td>
                                <td><?= $order['updated_at'] ?></td>
                                <td>
                                    <?php if ($order['order_status'] == 'pending') { ?>
                                        <a href="?act=cancel_order&order_id=<?= $order['order_id'] ?>" class="btn btn-danger">Hủy đơn</a>
                                    <?php } elseif ($order['order_status'] == 'completed') { ?>
                                        <a href="?act=confirm_order&order_id=<?= $order['order_id'] ?>" class="btn btn-success">Xác nhận</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Orders End -->

    <!-- Footer Start -->
    <?php require_once 'views/layouts/footer.php'; ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>

</html>

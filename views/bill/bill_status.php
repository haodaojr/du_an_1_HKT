<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trạng thái đơn hàng</title>
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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Trạng thái đơn hàng</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Trạng thái đơn hàng</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Order Status Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <h2 class="mb-4">Trạng thái đơn hàng của bạn</h2>
            <?php if (!empty($orders)) { ?>
                <?php foreach ($orders as $order) { ?>
                    <div class="order-status mb-4 border p-3 rounded">
                        <!-- </h3>Đơn hàng #<?= $order['bill_id'] ?></h3> -->
                        <p>Trạng thái: <?= $order['bill_status'] ?></p>
                        <p>Thanh toán: <?= $order['payment_type'] ?></p>
                        <p>Tổng tiền: <?= number_format($order['total'], 0, ',', '.') ?> VNĐ</p>
                        <h4>Sản phẩm:</h4>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($order['products']) && is_array($order['products'])) { ?>
                                    <?php foreach ($order['products'] as $product) { ?>
                                        <tr>
                                            <td>
                                                <img src="admin/uploads/img/<?= $product['product_img'] ?>" alt="Product Image" style="width: 50px; height: 50px;">
                                            </td>
                                            <td><?= $product['product_name']?></td>
                                            <td><?= number_format($product['product_price'], 0, ',', '.') ?> VNĐ</td>
                                            <td><?= $product['quantity'] ?></td>
                                            <td><?= number_format($product['product_price'] * $product['quantity'], 0, ',', '.') ?> VNĐ</td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Không có sản phẩm nào cho đơn hàng này.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php if ($order['bill_status'] == 'Đang chờ xác nhận') { ?>
                            <form action="?act=cancel_order" method="post">
                                <input type="hidden" name="bill_id" value="<?= htmlspecialchars($order['bill_id']) ?>">
                                <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                            </form>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>Không có đơn hàng nào.</p>
            <?php } ?>
        </div>
    </div>
    <!-- Order Status End -->

    <!-- Footer Start -->
    <?php require_once 'views/layouts/footer.php'; ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

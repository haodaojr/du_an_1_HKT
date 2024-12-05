<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Đặt hàng</title>
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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Đặt hàng</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Đặt hàng</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Order Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="row">
                <!-- Sản phẩm đã chọn -->
                <div class="col-lg-6">
                    <h2 class="mb-4">Sản phẩm đã chọn</h2>
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
                            <?php  if (isset($selected_products) && is_array($selected_products)) { ?>
                                <?php foreach ($selected_products as $product) { ?>
                                    <tr>
                                        <td><img src="admin/uploads/img/<?= $product['product_img'] ?>" alt="Product Image" style="width: 50px; height: 50px;"></td>
                                        <td><?= $product['product_name'] ?></td>
                                        <td><?= number_format($product['product_price'], 0, ',', '.') ?> VNĐ</td>
                                        <td><?= $product['quantity'] ?></td>
                                        <td><?= number_format($product['product_price'] * $product['quantity'], 0, ',', '.') ?> VNĐ</td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5">Không có sản phẩm nào được chọn.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Tổng tiền -->
                    <h3 class="mt-3">Tổng tiền: <?= number_format($total_price, 0, ',', '.') ?> VNĐ</h3>
                </div>

                <!-- Thông tin cá nhân -->
                <div class="col-lg-6">
                    <h2 class="mb-4">Thông tin cá nhân</h2>
                    <form action="?act=addBill" method="post">
                        <div class="form-group">
                            <label for="user_name">Họ và tên</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?= $_SESSION['user_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="user_address">Địa chỉ</label>
                            <input type="text" class="form-control" id="user_address" name="user_address" value="<?= $_SESSION['user_address']?>">
                        </div>
                        <div class="form-group">
                            <label for="user_phone">Số điện thoại</label>
                            <input type="text" class="form-control" id="user_phone" name="user_phone" value="<?= $_SESSION['user_phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="payment_type">Phương thức thanh toán</label>
                            <select class="form-control" id="payment_type" name="payment_type" required>
                                <option value="COD">Thanh toán khi nhận hàng (COD)</option>
                                <option value="Bank">Chuyển khoản ngân hàng</option>
                            </select>
                        </div>
                        <input type="hidden" name="total_price" value="<?= $total_price ?>">
                        <input type="hidden" name="selected_products" value="<?= htmlspecialchars(json_encode($selected_products)) ?>">
                        <button type="submit" class="btn btn-success">Xác nhận đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Order End -->

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

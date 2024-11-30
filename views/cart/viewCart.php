<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Giỏ hàng của bạn</title>
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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Giỏ hàng của bạn</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Giỏ hàng</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Cart Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="d-flex justify-content-end mb-3">
                <a href="?act=oderstatus" class="btn btn-info">Tình trạng đơn hàng</a>
            </div>
            <?php
            // Khởi tạo biến $total_price
            $total_price = 0;

            // Kiểm tra xem có sản phẩm nào trong giỏ không
            if (empty($carts)) {
                echo "<div class='alert alert-info'>Giỏ hàng của bạn hiện tại không có sản phẩm nào.</div>";
            } else {
            ?>
                <h2 class="mb-4">Giỏ hàng của bạn</h2>
                <form action="?act=create_order" method="post" class="mt-3">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Chọn</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($carts as $item) { ?>
                                <tr>
                                    <td><input type="checkbox" name="selected_products[]" value="<?= $item['product_id'] ?>"></td>
                                    <td><img src="admin/uploads/img/<?= $item['product_img'] ?>" alt="Product Image" style="width: 50px; height: 50px;"></td>
                                    <td><?= $item['product_name'] ?></td>
                                    <td><?= number_format($item['product_price'], 0, ',', '.') ?> VNĐ</td>
                                    <td>
                                        <form action="?act=update_cart" method="post" class="form-inline">
                                            <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                            <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">
                                            <input type="number" name="product_quantity" value="<?= $item['quantity'] ?>" min="1" class="form-control mr-2">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </form>
                                    </td>
                                    <td><?= number_format($item['product_price'] * $item['quantity'], 0, ',', '.') ?> VNĐ</td>
                                    <td><a href="?act=remove_from_cart&cart_id=<?= $item['cart_id'] ?>&product_id=<?= $item['product_id'] ?>" class="btn btn-danger">Xóa</a></td>
                                </tr>
                                <?php
                                // Tính tổng giá trị giỏ hàng
                                $total_price += $item['product_price'] * $item['quantity'];
                                ?>
                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- Tổng tiền -->
                    <h3 class="mt-3">Tổng tiền: <?= number_format($total_price, 0, ',', '.') ?> VNĐ</h3>

                    <!-- Form đặt hàng -->
                    <input type="hidden" name="total_price" value="<?= $total_price ?>">
                    <button type="submit" class="btn btn-success">Đặt hàng</button>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Cart End -->

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

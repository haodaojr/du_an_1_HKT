<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <style>
        .related-product-card {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .product-img {
            height: 200px; /* Adjust the height as needed */
            object-fit: cover;
            width: 100%;
        }

        .product-name {
            width: 100%; /* Ensure the width is consistent */
            white-space: nowrap; /* Prevent text from wrapping */
            overflow: hidden; /* Hide overflow text */
            text-overflow: ellipsis; /* Add ellipsis for overflow text */
            margin-top: 10px; /* Add margin to separate from the image */
        }

        .description-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>

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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Detail</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Hình ảnh sản phẩm -->
                <img src="admin/uploads/img/<?= $product['product_img'] ?>" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <h1 class="h2"><?= $product['product_name'] ?></h1>
                <p class="text-muted"><span class="text-danger"><?= number_format($product['product_price']) ?> VNĐ</span></p>
                <p class="lead">Số lượng: <?= $product['product_amount'] ?></p>

                <!-- Thêm trường số lượng với nút tăng và giảm -->
                <form action="?act=add_to_cart" method="post">
                    <?php if (isset($_SESSION['user_id'])): ?><input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>"> <?php endif; ?>
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    <input type="hidden" name="product_name" value="<?= $product['product_name'] ?>">
                    <input type="hidden" name="product_img" value="<?= $product['product_img'] ?>">
                    <input type="hidden" name="product_price" value="<?= $product['product_price'] ?>">
                    <input type="hidden" name="product_amount" value="<?= $product['product_amount'] ?>">

                    <div class="d-flex align-items-center mb-3">
                        <button type="button" class="btn btn-outline-secondary" onclick="decreaseQuantity()" <?= $product['product_amount'] == 0 ? 'disabled' : '' ?>>-</button>
                        <input type="number" class="form-control mx-2" name="quantity" min="1" max="<?= $product['product_amount'] ?>" value="<?= $product['product_amount'] == 0 ? '0' : '1' ?>" id="quantity" style="width: 80px;" readonly>
                        <button type="button" class="btn btn-outline-secondary" onclick="increaseQuantity()" <?= $product['product_amount'] == 0 ? 'disabled' : '' ?>>+</button>
                        <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 ms-3" <?= $product['product_amount'] == 0 ? 'disabled' : '' ?>>Add to cart</button>
                    </div>

                    <?php if ($product['product_amount'] == 0): ?>
                        <p class="text-danger">Hết hàng</p>
                    <?php endif; ?>
                </form>

                <hr>
                <h3 class="description-title">Mô tả sản phẩm</h3> <!-- Thêm tiêu đề mô tả sản phẩm -->
                <p><?= $product['product_description'] ?></p> <!-- Thêm mô tả sản phẩm -->
                <p><strong>Category:</strong> <?= $product['product_category_name'] ?></p>
            </div>
        </div>

        <!-- Phần bình luận và đánh giá -->
        <div class="reviews">
            <h3 class="description-title">Bình luận và đánh giá</h3>
            <div class="row">
                <?php foreach ($reviews as $review): ?>
                <div class="col-md-12 mb-4">
                    <div class="review-card border p-3">
                        <div class="d-flex justify-content-between">
                            <h5><?= $review['user_name'] ?></h5>
                            <div>
                                <?php for ($i = 0; $i < $review['rating']; $i++): ?>
                                <small class="fa fa-star text-primary"></small>
                                <?php endfor; ?>
                                <?php for ($i = $review['rating']; $i < 5; $i++): ?>
                                <small class="fa fa-star text-muted"></small>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <p><?= $review['comment'] ?></p>      <small class="text-muted"><?= $review['created_at'] ?></small>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php if($check && !$check2){ ?>
                <a class="btn btn-primary" href="?act=review&id=<?= $product['product_id'] ?>">Viết đánh giá</a>
            <?php } ?>
        </div>

        <!-- Phần sản phẩm liên quan -->
        <div class="related-products">
            <h3 class="description-title">Sản phẩm liên quan</h3>
            <div class="row">
                <?php foreach ($product2 as $product): ?>
                <div class="col-md-3 mb-4"> <!-- Thêm mb-4 để có khoảng cách giữa các hàng -->
                    <div class="related-product-card border text-center"> <!-- Thêm text-center để căn giữa -->
                        <a href="?act=detail&id=<?= $product['product_id'] ?>" class="text-decoration-none text-dark">
                            <img class="img-fluid product-img" src="admin/uploads/img/<?= $product['product_img'] ?>" alt="<?= $product['product_img'] ?>">
                            <h5 class="product-name"><?= $product['product_name'] ?></h5>
                            <p class="text-danger"><?= number_format($product['product_price']) ?> VNĐ</p>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

        function increaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentValue = parseInt(quantityInput.value);
            var maxValue = parseInt(quantityInput.max);
            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
            }
        }
    </script>

    <!-- Contact End -->

    <!-- Footer Start -->
    <?php require_once 'views/layouts/footer.php'; ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>

</html>

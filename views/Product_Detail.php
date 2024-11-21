<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Product Detail</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php require_once 'views/layouts/link.php'; ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .qty-input {
            max-width: 80px;
        }

        .size-options {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .size-options label {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }

        .size-options input[type="radio"] {
            display: none;
        }

        .size-options input[type="radio"]:checked+label {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .product-card {
            margin-bottom: 30px;
            text-align: center;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .product-details {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .product-price {
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <?php require_once 'views/layouts/siderbar.php'; ?>
    <!-- Navbar End -->

    <!-- Product Detail Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-image text-center">
                        <?php
                        $imagePath = "admin/uploads/img/" . htmlspecialchars($SPCT['product_img']);
                        if (file_exists($imagePath) && !empty($SPCT['product_img'])) {
                            echo '<img class="img-fluid rounded shadow" src="' . $imagePath . '" alt="Product Image">';
                        } else {
                            echo '<img class="img-fluid rounded shadow" src="../uploads/img/default.jpg" alt="Default Image">';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="product-details bg-light p-4 rounded shadow">
                        <h1 class="display-5 mb-3">
                            <?= isset($SPCT['product_name']) ? htmlspecialchars($SPCT['product_name']) : 'Tên sản phẩm không có' ?>
                        </h1>
                        <p class="mb-4">Mô tả:
                            <?= isset($SPCT['description']) ? htmlspecialchars($SPCT['description']) : 'Mô tả không có' ?>
                        </p>
                        <h4 class="mb-3">Giá:
                            $<?= isset($SPCT['product_price']) ? htmlspecialchars($SPCT['product_price']) : 'Giá không có' ?>
                        </h4>
                        <div class="row g-3 mb-4">
                            <div class="col-auto d-flex align-items-center">
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="decreaseQuantity()">-</button>
                                <input type="text" class="form-control text-center mx-2" value="1" id="quantity" min="1"
                                    max="99">
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="increaseQuantity()">+</button>
                            </div>
                            <div class="col-12">
                                <div class="size-options">
                                    <label><input type="radio" name="size" value="M" checked> M</label>
                                    <label><input type="radio" name="size" value="L"> L</label>
                                    <label><input type="radio" name="size" value="XL"> XL</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="button">Add to
                                    Cart</button>
                            </div>
                        </div>
                        <h5 class="mb-3">Chi tiết sản phẩm</h5>
                        <ul class="list-unstyled">
                            <li>Detail 1</li>
                            <li>Detail 2</li>
                            <li>Detail 3</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Detail End -->

    <!-- Other Products Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h2 class="mb-4">Sản phẩm khác</h2>
            <div class="row g-5">
                <?php
                // Giả sử bạn đã lấy tất cả sản phẩm trong controller
                $otherProducts = $this->ProductMOdels->ShowAll(); // hoặc phương thức tương tự
                
                // Giới hạn chỉ lấy 3 sản phẩm
                $otherProducts = array_slice($otherProducts, 0, 3);

                foreach ($otherProducts as $Pro): ?>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-card">
                            <a href="?act=Pro_detail&product_id=<?= $Pro['product_id'] ?>"
                                class="d-block product-item rounded">
                                <img src="admin/uploads/img/<?= $Pro['product_img'] ?>" alt="">
                                <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                                    <h4 class="text-primary"><?= htmlspecialchars($Pro['product_name']) ?></h4>
                                    <h4 class="text-primary">$<?= htmlspecialchars($Pro['product_price']) ?></h4>
                                    <span class="text-body"><?= htmlspecialchars($Pro['product_description']) ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Other Products End -->

    <!-- Footer Start -->
    <?php require_once 'views/layouts/footer.php'; ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <script>
        function increaseQuantity() {
            var quantityInput = document.getElementById("quantity");
            var currentValue = parseInt(quantityInput.value);
            if (currentValue < 99) {
                quantityInput.value = currentValue + 1;
            }
        }

        function decreaseQuantity() {
            var quantityInput = document.getElementById("quantity");
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }
    </script>

    <!-- Bootstrap JS (nếu cần) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
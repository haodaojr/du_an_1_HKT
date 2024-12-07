<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Trang chủ</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<?php require_once 'views/layouts/link.php'; ?>
<link rel="stylesheet" href="assets/css/search.css">
<!-- <script src="assets/js/search.js"></script> -->
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

<!-- Products Start -->
<div class="container-fluid product py-5 my-5">
    <div class="container py-5">
        <div class="section-title text-center mx-auto" style="max-width: 500px;">
            <p class="fs-5 fw-medium fst-italic text-primary">Tìm Kiếm Sản Phẩm</p>
            <form method="POST" action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Nhập tên sản phẩm">
                    <select name="category_id" class="form-select">
                        <option value="0">Tất cả danh mục</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['product_category_id'] ?>">
                                <?= $category['product_category_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </form>
        </div>

        <!-- Slider container -->
        <div class="slider-container">
            <div class="slider-wrapper">
                <div class="slider-track">
                    <?php foreach ($products as $product): ?>
                        <a href="?act=detail&id=<?= $product['product_id'] ?>" class="product-item d-block rounded">
                            <div class="product-frame">
                                <img src="admin/uploads/img/<?= $product['product_img'] ?>"
                                     alt="<?= $product['product_name'] ?>">
                            </div>
                            <div class="product-content">
                                <h4><?= $product['product_name'] ?></h4>
                                <p><?= $product['product_description'] ?></p>
                                <?php if ($product['product_amount'] > 0): ?>
                                    <button class="btn btn-success">Còn hàng</button>
                                <?php else: ?>
                                    <button class="btn btn-danger">Hết hàng</button>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="slider-controls text-center">
                <button class="slider-btn prev">←</button>
                <button class="slider-btn next">→</button>
            </div>
        </div>
    </div>
</div>
<!-- Contact Start -->

<?php require_once 'views/layouts/lib.php'; ?>


<!-- Footer Start -->
<?php require_once 'views/layouts/footer.php'; ?>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>

</body>
</html>
<script>
    const track = document.querySelector('.slider-track');
const prevBtn = document.querySelector('.slider-btn.prev');
const nextBtn = document.querySelector('.slider-btn.next');

const productCount = document.querySelectorAll('.product-item').length;
const visibleProducts = 3; // Number of visible products
const slideWidth = track.offsetWidth / visibleProducts;

let currentIndex = 0;

// Update slider position
function updateSlider() {
    track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
}

// Next button
nextBtn.addEventListener('click', () => {
    currentIndex++;
    if (currentIndex >= Math.ceil(productCount / visibleProducts)) {
        currentIndex = 0; // Loop back to start
    }
    updateSlider();
});

// Previous button
prevBtn.addEventListener('click', () => {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = Math.ceil(productCount / visibleProducts) - 1; // Go to end
    }
    updateSlider();
});

// Auto sliding
setInterval(() => {
    nextBtn.click();
}, 3000);
 // Change slides every 3 seconds
</script>
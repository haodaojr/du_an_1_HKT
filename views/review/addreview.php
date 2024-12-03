<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Viết Đánh Giá</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <?php require_once 'views/layouts/link.php'; ?>
    <style>
        .rating {
            display: flex;
            justify-content: center;
        }

        .rating label {
            cursor: pointer;
            width: 30px;
            height: 30px;
            margin: 0 5px;
            background: url('https://img.freepik.com/premium-vector/white-star-icon-volumetric-paper-cut-design-element-transparent-background_822686-400.jpg') no-repeat center;
            background-size: contain;
        }

        .rating label.selected,
        .rating label:hover,
        .rating label:hover ~ label {
            background: url('https://static.vecteezy.com/system/resources/thumbnails/009/342/559/small/mobile-game-golden-star-clipart-design-illustration-free-png.png') no-repeat center;
            background-size: contain;
        }
    </style>
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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Viết Đánh Giá</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Review Start -->
    <div class="container-xxl review py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Viết Đánh Giá</h1>
            </div>
            <?php if (isset($_SESSION['user_id'])): ?>
            <form action="?act=add_review" method="post">
                <div class="mb-3">
                    <label for="rating" class="form-label">Đánh giá:</label>
                    <div class="rating" id="rating">
                        <label for="star1" title="1 sao" data-value="1"></label>
                        <label for="star2" title="2 sao" data-value="2"></label>
                        <label for="star3" title="3 sao" data-value="3"></label>
                        <label for="star4" title="4 sao" data-value="4"></label>
                        <label for="star5" title="5 sao" data-value="5"></label>
                        <input type="hidden" name="rating" id="rating-value" value="">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Bình luận:</label>
                    <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
                </div>
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
            </form>
            <?php else: ?>
            <p class="text-center">Bạn cần <a href="?act=login">đăng nhập</a> để viết đánh giá.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Review End -->

    <!-- Footer Start -->
    <?php require_once 'views/layouts/footer.php'; ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ratingLabels = document.querySelectorAll('.rating label');
            const ratingValue = document.getElementById('rating-value');

            // Set the selected stars based on the hidden input value
            if (ratingValue.value) {
                const selectedValue = ratingValue.value;
                ratingLabels.forEach(label => {
                    if (label.getAttribute('data-value') <= selectedValue) {
                        label.classList.add('selected');
                    }
                });
            }

            ratingLabels.forEach(label => {
                label.addEventListener('click', function () {
                    const selectedValue = this.getAttribute('data-value');
                    ratingLabels.forEach(l => l.classList.remove('selected'));
                    ratingLabels.forEach(l => {
                        if (l.getAttribute('data-value') <= selectedValue) {
                            l.classList.add('selected');
                        }
                    });
                    ratingValue.value = selectedValue;
                });
            });
        });
    </script>
</body>

</html>

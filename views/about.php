<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Giới thiệu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <?php require_once 'views/layouts/link.php' ?>
</head>

<body>
    <!-- Bắt đầu Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Kết thúc Spinner -->

    <!-- Bắt đầu Navbar -->
    <?php require_once 'views/layouts/siderbar.php' ?>
    <!-- Kết thúc Navbar -->

    <!-- Bắt đầu Tiêu đề Trang -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Giới thiệu</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Trang</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Giới thiệu</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Kết thúc Tiêu đề Trang -->

    <!-- Bắt đầu Giới thiệu -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="assets/img/about-1.jpg" alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="assets/img/about-3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="assets/img/about-4.jpg" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="assets/img/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Giới thiệu</p>
                        <h1 class="display-6">Lịch sử thành công của TEA House trong 25 năm</h1>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="assets/img/about-5.jpg" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h5>Trà của chúng tôi là một trong những đồ uống phổ biến nhất trên thế giới</h5>
                            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit</p>
                        </div>
                    </div>
                    <div class="border-top mb-4"></div>
                    <div class="row g-3">
                        <div class="col-sm-8">
                            <h5>Uống một tách trà hàng ngày tốt cho sức khỏe của bạn</h5>
                            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="assets/img/about-6.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kết thúc Giới thiệu -->

    <!-- Bắt đầu Footer -->
    <?php require_once 'views/layouts/footer.php'; ?>
    <!-- Kết thúc Footer -->

    <!-- Trở lại đầu trang -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>

</html>

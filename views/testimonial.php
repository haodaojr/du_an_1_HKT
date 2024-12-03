<!DOCTYPE html>  
<html lang="vi">  

<head>  
    <meta charset="utf-8">  
    <title>Chứng thực</title>  
    <meta content="width=device-width, initial-scale=1.0" name="viewport">  
    <meta content="" name="keywords">  
    <meta content="" name="description">  

    <?php require_once 'views/layouts/link.php'; ?>  
</head>  

<body>  
    <!-- Spinner Bắt đầu -->  
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">  
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>  
    </div>  
    <!-- Spinner Kết thúc -->  

    <!-- Thanh điều hướng Bắt đầu -->  
    <?php require_once 'views/layouts/siderbar.php'; ?>  
    <!-- Thanh điều hướng Kết thúc -->  

    <!-- Tiêu đề Trang Bắt đầu -->  
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">  
        <div class="container text-center py-5">  
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Chứng thực</h1>  
            <nav aria-label="breadcrumb animated slideInDown">  
                <ol class="breadcrumb justify-content-center mb-0">  
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>  
                    <li class="breadcrumb-item"><a href="#">Trang</a></li>  
                    <li class="breadcrumb-item text-dark" aria-current="page">Chứng thực</li>  
                </ol>  
            </nav>  
        </div>  
    </div>  
    <!-- Tiêu đề Trang Kết thúc -->  

    <!-- Chứng thực Bắt đầu -->  
    <div class="container-fluid py-5">  
        <div class="container">  
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">  
                <p class="fs-5 fw-medium fst-italic text-primary">Chứng thực</p>  
                <h1 class="display-6">Khách hàng nói gì về trà của chúng tôi</h1>  
            </div>  
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.5s">  
                <div class="testimonial-item p-4 p-lg-5">  
                    <p class="mb-4">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>  
                    <div class="d-flex align-items-center justify-content-center">  
                        <img class="img-fluid flex-shrink-0" src="assets/img/testimonial-1.jpg" alt="">  
                        <div class="text-start ms-3">  
                            <h5>Tên Khách Hàng</h5>  
                            <span class="text-primary">Nghề nghiệp</span>  
                        </div>  
                    </div>  
                </div>  
                <div class="testimonial-item p-4 p-lg-5">  
                    <p class="mb-4">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>  
                    <div class="d-flex align-items-center justify-content-center">  
                        <img class="img-fluid flex-shrink-0" src="assets/img/testimonial-2.jpg" alt="">  
                        <div class="text-start ms-3">  
                            <h5>Tên Khách Hàng</h5>  
                            <span class="text-primary">Nghề nghiệp</span>  
                        </div>  
                    </div>  
                </div>  
                <div class="testimonial-item p-4 p-lg-5">  
                    <p class="mb-4">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>  
                    <div class="d-flex align-items-center justify-content-center">  
                        <img class="img-fluid flex-shrink-0" src="assets/img/testimonial-3.jpg" alt="">  
                        <div class="text-start ms-3">  
                            <h5>Tên Khách Hàng</h5>  
                            <span class="text-primary">Nghề nghiệp</span>  
                        </div>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
    <!-- Chứng thực Kết thúc -->  

    <!-- Chân trang Bắt đầu -->  
    <?php require_once 'views/layouts/footer.php'; ?>  
    <!-- Chân trang Kết thúc -->  

    <!-- Quay lại đầu trang -->  
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>  
</body>  

</html>
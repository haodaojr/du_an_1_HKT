<!DOCTYPE html>  
<html lang="en">  

<head>  
    <meta charset="utf-8">  
    <title>Blog</title>  
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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Articles</h1>  
            <nav aria-label="breadcrumb animated slideInDown">  
                <ol class="breadcrumb justify-content-center mb-0">  
                    <li class="breadcrumb-item"><a href="#">Home</a></li>  
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>  
                    <li class="breadcrumb-item text-dark" aria-current="page">Articles</li>  
                </ol>  
            </nav>  
        </div>  
    </div>  
    <!-- Page Header End -->  

    <!-- Article Start -->  
    <div class="container-xxl py-5">  
        <div class="container">  
            <div class="row g-5">  

                <!-- Article 1: Cà phê -->  
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">  
                    <img class="img-fluid" src="admin/uploads/img/BAC_XIU.jpeg" alt="Cà phê">  
                </div>  
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">  
                    <div class="section-title">  
                        <p class="fs-5 fw-medium fst-italic text-primary">Featured Article</p>  
                        <h1 class="display-6">Khám Phá Thế Giới Cà Phê</h1>  
                    </div>  
                    <p class="mb-4">Cà phê không chỉ là một thức uống, mà còn là một văn hóa. Từ những hạt cà phê Arabica đến Robusta, mỗi loại mang đến hương vị và trải nghiệm khác nhau.</p>  
                    <p class="mb-4">Cà phê có thể được chế biến theo nhiều cách, từ espresso mạnh mẽ đến cappuccino nhẹ nhàng, và mỗi phương pháp đều có những tín đồ riêng.</p>  
                    <a href="#" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>  
                </div>  

                <!-- Article 2: Trà sữa -->  
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">  
                    <img class="img-fluid" src="admin/uploads/img/Tra_Sua_Tran_Chau.webp" alt="Trà sữa">  
                </div>  
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">  
                    <div class="section-title">  
                        <p class="fs-5 fw-medium fst-italic text-primary">Featured Article</p>  
                        <h1 class="display-6">Trà Sữa - Hương Vị Ngọt Ngào</h1>  
                    </div>  
                    <p class="mb-4">Trà sữa đã trở thành một hiện tượng toàn cầu, với nhiều hương vị và kiểu dáng khác nhau. Từ trà xanh đến trà đen, mỗi loại trà đều mang đến những trải nghiệm thú vị.</p>  
                    <p class="mb-4">Những viên trân châu dẻo dai kết hợp với trà và sữa tạo nên một thức uống độc đáo mà ai cũng yêu thích.</p>  
                    <a href="#" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>  
                </div>  

                <!-- Article 3: Nước ngọt -->  
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">  
                    <img class="img-fluid" src="admin/uploads/img/nuoc-ngot.jpg" alt="Nước ngọt">  
                </div>  
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">  
                    <div class="section-title">  
                        <p class="fs-5 fw-medium fst-italic text-primary">Featured Article</p>  
                        <h1 class="display-6">Nước Ngọt - Thức Uống Giải Khát</h1>  
                    </div>  
                    <p class="mb-4">Nước ngọt là lựa chọn phổ biến trong những ngày hè oi ả. Từ những thương hiệu nổi tiếng đến những loại nước tự làm, nước ngọt luôn mang lại sự tươi mát.</p>  
                    <p class="mb-4">Với nhiều hương vị phong phú, nước ngọt không chỉ giải khát mà còn là một phần không thể thiếu trong các bữa tiệc.</p>  
                    <a href="#" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>  
                </div>  

                <!-- Article 4: Nước ép -->  
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">  
                    <img class="img-fluid" src="admin/uploads/img/nuoc_ep_cam.jpg" alt="Nước ép">  
                </div>  
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">  
                    <div class="section-title">  
                        <p class="fs-5 fw-medium fst-italic text-primary">Featured Article</p>  
                        <h1 class="display-6">Nước Ép - Sự Tươi Mát Từ Thiên Nhiên</h1>  
                    </div>  
                    <p class="mb-4">Nước ép trái cây là một cách tuyệt vời để bổ sung vitamin và khoáng chất cho cơ thể. Từ nước ép cam đến nước ép dứa, mỗi loại đều mang lại lợi ích sức khỏe riêng.</p>  
                    <p class="mb-4">Nước ép không chỉ ngon mà còn giúp thanh lọc cơ thể và cung cấp năng lượng cho bạn trong suốt cả ngày.</p>  
                    <a href="#" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>  
                </div>  

            </div>  
        </div>  
    </div>  
    <!-- Article End -->  

    <!-- Footer Start -->  
    <?php require_once 'views/layouts/footer.php'; ?>  
    <!-- Footer End -->  

    <!-- Back to Top -->  
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>  
</body>  

</html>
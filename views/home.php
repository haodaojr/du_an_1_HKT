<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
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


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">  
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">  
        <div class="carousel-inner">  
            <div class="carousel-item active">  
                <img class="w-100" src="assets/img/carousel-1.jpg" alt="Image">  
                <div class="carousel-caption">  
                    <div class="container">  
                        <div class="row justify-content-center">  
                            <div class="col-lg-7 text-center">  
                                <p class="fs-4 text-white animated zoomIn">Chào mừng đến với <strong class="text-dark">TEA House</strong></p>  
                                <h1 class="display-1 text-dark mb-4 animated zoomIn">Sản xuất trà hữu cơ & chất lượng</h1>  
                                <a href="" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Khám phá thêm</a>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  
            <div class="carousel-item">  
                <img class="w-100" src="assets/img/carousel-2.jpg" alt="Image">  
                <div class="carousel-caption">  
                    <div class="container">  
                        <div class="row justify-content-center">  
                            <div class="col-lg-7 text-center">  
                                <p class="fs-4 text-white animated zoomIn">Chào mừng đến với <strong class="text-dark">TEA House</strong></p>  
                                <h1 class="display-1 text-dark mb-4 animated zoomIn">Sản xuất trà hữu cơ & chất lượng</h1>  
                                <a href="" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Khám phá thêm</a>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  
        </div>  
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"  
            data-bs-slide="prev">  
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>  
            <span class="visually-hidden">Trước</span>  
        </button>  
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"  
            data-bs-slide="next">  
            <span class="carousel-control-next-icon" aria-hidden="true"></span>  
            <span class="visually-hidden">Tiếp theo</span>  
        </button>  
    </div>  
</div>
    <!-- Carousel End -->


    <!-- About Start -->
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
                    <p class="fs-5 fw-medium fst-italic text-primary">Về Chúng Tôi</p>  
                    <h1 class="display-6">Lịch sử thành công của TEA House trong 25 năm</h1>  
                </div>  
                <div class="row g-3 mb-4">  
                    <div class="col-sm-4">  
                        <img class="img-fluid bg-white w-100" src="assets/img/about-5.jpg" alt="">  
                    </div>  
                    <div class="col-sm-8">  
                        <h5>Trà của chúng tôi là một trong những đồ uống phổ biến nhất trên thế giới</h5>  
                        <p class="mb-0">Thời gian trôi qua, trà vẫn giữ được sự hấp dẫn. Trà không chỉ ngon mà còn mang lại nhiều lợi ích cho sức khỏe.</p>  
                    </div>  
                </div>  
                <div class="border-top mb-4"></div>  
                <div class="row g-3">  
                    <div class="col-sm-8">  
                        <h5>Sử dụng một tách trà mỗi ngày là tốt cho sức khỏe của bạn</h5>  
                        <p class="mb-0">Uống trà hàng ngày giúp cải thiện sức khỏe, giảm stress và tăng cường miễn dịch.</p>  
                    </div>  
                    <div class="col-sm-4">  
                        <img class="img-fluid bg-white w-100" src="assets/img/about-6.jpg" alt="">  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>
    <!-- About End -->


    <!-- Products Start -->
    <div class="container-fluid product py-5 my-5">  
    <div class="container py-5">  
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">  
            <p class="fs-5 fw-medium fst-italic text-primary">Sản Phẩm Của Chúng Tôi</p>  
            <h1 class="display-6">Đồ uống không chỉ giúp giải khát mà còn cung cấp nhiều lợi ích sức khỏe, từ tăng cường miễn dịch đến hỗ trợ tiêu hóa</h1>  
        </div>  
        <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">  
            <?php foreach($products as $product): ?>  
                <a href="?act=detail&id=<?= $product['product_id'] ?>" class="d-block product-item rounded">  
                    <img src="admin/uploads/img/<?= $product['product_img'] ?>" height="300" alt="">  
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">  
                        <h4 class="text-primary"><?= $product['product_name'] ?></h4>  
                        <span class="text-body"><?= $product['product_description'] ?></span>  
                        <div class="mt-3">  
                            <?php if ($product['product_amount'] > 0): ?>  
                                <button class="btn btn-success">Còn hàng</button>  
                            <?php else: ?>  
                                <button class="btn btn-danger">Hết hàng</button>  
                            <?php endif; ?>  
                        </div>  
                    </div>  
                </a>  
            <?php endforeach; ?>  
        </div>  
    </div>  
</div>
    <!-- Products End -->


    <!-- Article Start -->
   <div class="container-xxl py-5">  
    <div class="container">  
        <div class="row g-5">  
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">  
                <img class="img-fluid" src="assets/img/article.jpg" alt="">  
            </div>  
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">  
                <div class="section-title">  
                    <p class="fs-5 fw-medium fst-italic text-primary">Bài Viết Nổi Bật</p>  
                    <h1 class="display-6">Giới thiệu về các loại đồ uống phổ biến: Trà Sữa, Sữa Chua, và Cà Phê</h1>  
                </div>  
                <p class="mb-4">Trà sữa, sữa chua và cà phê là những loại đồ uống rất được ưa chuộng hiện nay. Mỗi loại đồ uống không chỉ mang hương vị đặc trưng mà còn có những lợi ích sức khỏe riêng biệt.</p>  
                <p class="mb-4">Trà sữa, với hương vị ngọt ngào và sự kết hợp của trà và sữa, đã trở thành một hiện tượng toàn cầu. Các loại trà sữa với đa dạng hương vị và topping như trân châu, thạch và pudding không chỉ hấp dẫn về hình thức mà còn là sự kết hợp thú vị cho các tín đồ ẩm thực.</p>  
                <p class="mb-4">Sữa chua uống là một lựa chọn tuyệt vời cho những ai yêu thích sự tươi mát và bổ dưỡng. Với hàm lượng probiotic cao, nó không chỉ giúp tiêu hóa mà còn cung cấp năng lượng cho cơ thể.</p>  
                <p class="mb-4">Cà phê, với hương vị đắng và mạnh mẽ, là lựa chọn không thể thiếu cho nhiều người. Không chỉ giúp tăng cường sự tỉnh táo mà còn chứa nhiều chất chống oxy hóa, cà phê còn được nghiên cứu là có tác dụng phòng ngừa một số bệnh mãn tính.</p>  
                <a href="" class="btn btn-primary rounded-pill py-3 px-5">Đọc Thêm</a>  
            </div>  
        </div>  
    </div>  
</div>  
<!-- Article End -->

    <!-- Video Start -->
    <div class="container-fluid video my-5">  
    <div class="container">  
        <div class="row g-0">  
            <div class="col-lg-6 py-5 wow fadeIn" data-wow-delay="0.1s">  
                <div class="py-5">  
                    <h1 class="display-6 mb-4">Nước ép là thức uống của <span class="text-white">sức khỏe</span> và <span class="text-white">sảng khoái</span></h1>  
                    <h5 class="fw-normal lh-base fst-italic text-white mb-5">Nước ép từ trái cây tươi không chỉ đem lại hương vị tuyệt vời mà còn mang lại nhiều lợi ích sức khỏe cho cơ thể.</h5>  
                    <div class="row g-4 mb-5">  
                        <div class="col-sm-6">  
                            <div class="d-flex align-items-center">  
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">  
                                    <i class="fa fa-check"></i>  
                                </div>  
                                <span class="text-dark">Nguồn cung cấp vitamin dồi dào</span>  
                            </div>  
                        </div>  
                        <div class="col-sm-6">  
                            <div class="d-flex align-items-center">  
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">  
                                    <i class="fa fa-check"></i>  
                                </div>  
                                <span class="text-dark">Giàu chất chống oxy hóa</span>  
                            </div>  
                        </div>  
                        <div class="col-sm-6">  
                            <div class="d-flex align-items-center">  
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">  
                                    <i class="fa fa-check"></i>  
                                </div>  
                                <span class="text-dark">Thúc đẩy hệ tiêu hóa khỏe mạnh</span>  
                            </div>  
                        </div>  
                        <div class="col-sm-6">  
                            <div class="d-flex align-items-center">  
                                <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">  
                                    <i class="fa fa-check"></i>  
                                </div>  
                                <span class="text-dark">Tốt cho làn da và thể chất</span>  
                            </div>  
                        </div>  
                    </div>  
                    <a class="btn btn-light rounded-pill py-3 px-5" href="">Khám Phá Thêm</a>  
                </div>  
            </div>  
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">  
                <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">  
                    <button type="button" class="btn-play" data-bs-toggle="modal"  
                        data-src="https://www.youtube.com/embed/7kO_ALcwNAw" data-bs-target="#videoModal">  
                        <span></span>  
                    </button>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>
    <!-- Video End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Store Start -->
    <div class="container-xxl py-5">  
    <div class="container">  
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">  
            <p class="fs-5 fw-medium fst-italic text-primary">Cửa Hàng Trực Tuyến</p>  
            <h1 class="display-6">Bạn muốn giữ sức khỏe? Chọn nước ép tươi ngon</h1>  
        </div>  
        <div class="row g-4">  
            <?php foreach($productThere as $product): ?>  
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">  
                <div class="store-item position-relative text-center">  
                    <img class="img-fluid" src="admin/uploads/img/<?= $product['product_img'] ?>" alt="">  
                    <div class="p-4">  
                        <div class="text-center mb-3">  
                            <small class="fa fa-star text-primary"></small>  
                            <small class="fa fa-star text-primary"></small>  
                            <small class="fa fa-star text-primary"></small>  
                            <small class="fa fa-star text-primary"></small>  
                            <small class="fa fa-star text-primary"></small>  
                        </div>  
                        <h4 class="mb-3"><?= $product['product_name'] ?></h4>  
                        <p><?= $product['product_description'] ?></p>  
                        <h4 class="text-primary"><?= $product['product_price'] ?> VNĐ</h4>  
                    </div>  
                    <div class="store-overlay">  
                        <a href="?act=detail&id=<?= $product['product_id'] ?>" class="btn btn-primary rounded-pill py-2 px-4 m-2">Xem Chi Tiết <i class="fa fa-arrow-right ms-2"></i></a>  
                    </div>  
                    <div class="mt-3">  
                        <?php if ($product['product_amount'] > 0): ?>  
                            <button class="btn btn-success">Còn hàng</button>  
                        <?php else: ?>  
                            <button class="btn btn-danger">Hết hàng</button>  
                        <?php endif; ?>  
                    </div>  
                </div>  
            </div>  
            <?php endforeach; ?>  
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">  
                <a href="" class="btn btn-primary rounded-pill py-3 px-5">Xem Thêm Sản Phẩm</a>  
            </div>  
        </div>  
    </div>  
</div>
    <!-- Store End -->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-white">Testimonial</p>
                <h1 class="display-6">What our clients say about our tea</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.5s">
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="assets/img/testimonial-1.jpg" alt="">
                        <div class="text-start ms-3">
                            <h5>Client Name</h5>
                            <span class="text-primary">Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="assets/img/testimonial-2.jpg" alt="">
                        <div class="text-start ms-3">
                            <h5>Client Name</h5>
                            <span class="text-primary">Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="assets/img/testimonial-3.jpg" alt="">
                        <div class="text-start ms-3">
                            <h5>Client Name</h5>
                            <span class="text-primary">Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
                <h1 class="display-6">Contact us right now</h1>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8">
                    <p class="text-center mb-5">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                    <div class="row g-5">
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">info@example.com</p>
                            <p class="mb-0">support@example.com</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">+012 345 67890</p>
                            <p class="mb-0">+012 345 67890</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">123 Street</p>
                            <p class="mb-0">New York, USA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'views/layouts/lib.php'; ?>


    <!-- Footer Start -->
    <?php require_once 'views/layouts/footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


   
</body>

</html>
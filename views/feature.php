<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="utf-8">  
    <title>Tính Năng</title>  
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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Tính Năng</h1>  
            <nav aria-label="breadcrumb animated slideInDown">  
                <ol class="breadcrumb justify-content-center mb-0">  
                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>  
                    <li class="breadcrumb-item"><a href="#">Các Trang</a></li>  
                    <li class="breadcrumb-item text-dark" aria-current="page">Tính Năng</li>  
                </ol>  
            </nav>  
        </div>  
    </div>  
    <!-- Page Header End -->  

    <!-- Video Start -->  
    <div class="container-fluid video" style="margin-top: 6rem; margin-bottom: 6rem;">  
        <div class="container">  
            <div class="row g-0">  
                <div class="col-lg-6 py-5 wow fadeIn" data-wow-delay="0.1s">  
                    <div class="py-5">  
                        <h1 class="display-6 mb-4">Trà là thức uống của <span class="text-white">sức khỏe</span> và <span class="text-white">vẻ đẹp</span></h1>  
                        <h5 class="fw-normal lh-base fst-italic text-white mb-5">Trà không chỉ mang lại hương vị tuyệt vời mà còn có nhiều lợi ích cho sức khỏe. Từ trà xanh, trà đen đến trà thảo mộc, mỗi loại trà đều có những đặc tính riêng biệt.</h5>  
                        <div class="row g-4 mb-5">  
                            <div class="col-sm-6">  
                                <div class="d-flex align-items-center">  
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">  
                                        <i class="fa fa-check"></i>  
                                    </div>  
                                    <span class="text-dark">Sự đa dạng tuyệt vời của trà</span>  
                                </div>  
                            </div>  
                            <div class="col-sm-6">  
                                <div class="d-flex align-items-center">  
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">  
                                        <i class="fa fa-check"></i>  
                                    </div>  
                                    <span class="text-dark">Gia vị và phụ gia tự nhiên</span>  
                                </div>  
                            </div>  
                            <div class="col-sm-6">  
                                <div class="d-flex align-items-center">  
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">  
                                        <i class="fa fa-check"></i>  
                                    </div>  
                                    <span class="text-dark">Phụ kiện độc đáo cho trà</span>  
                                </div>  
                            </div>  
                            <div class="col-sm-6">  
                                <div class="d-flex align-items-center">  
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">  
                                        <i class="fa fa-check"></i>  
                                    </div>  
                                    <span class="text-dark">Tốt cho sức khỏe và vẻ đẹp</span>  
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
                    <h3 class="modal-title" id="exampleModalLabel">Video Youtube</h3>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                </div>  
                <div class="modal-body">  
                    <!-- Tỷ lệ 16:9 -->  
                    <div class="ratio ratio-16x9">  
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"  
                            allow="autoplay"></iframe>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
    <!-- Video Modal End -->  

    <!-- Footer Start -->  
    <?php require_once 'views/layouts/footer.php'; ?>  
    <!-- Footer End -->  

    <!-- Back to Top -->  
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>  

    <?php require_once 'views/layouts/lib.php'; ?>  
</body>  
</html>
<!DOCTYPE html>  
<html lang="en">  

<head>  
    <meta charset="utf-8">  
    <title>Liên Hệ</title>  
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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Liên Hệ Với Chúng Tôi</h1>  
            <nav aria-label="breadcrumb animated slideInDown">  
                <ol class="breadcrumb justify-content-center mb-0">  
                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>  
                    <li class="breadcrumb-item text-dark" aria-current="page">Liên Hệ</li>  
                </ol>  
            </nav>  
        </div>  
    </div>  
    <!-- Page Header End -->  

    <!-- Contact Start -->  
    <div class="container-xxl contact py-5">  
        <div class="container">  
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">  
                <p class="fs-5 fw-medium fst-italic text-primary">Liên Hệ Với Chúng Tôi</p>  
                <h1 class="display-6">Nếu Bạn Có Bất Kỳ Thắc Mắc Nào, Vui Lòng Liên Hệ Với Chúng Tôi</h1>  
            </div>  
            <div class="row g-5 mb-5">  
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">  
                    <div class="btn-square mx-auto mb-3">  
                        <i class="fa fa-envelope fa-2x text-white"></i>  
                    </div>  
                    <p class="mb-2">tuanndph53054@gmail.com</p>  
                    <p class="mb-0">support@example.com</p>  
                </div>  
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">  
                    <div class="btn-square mx-auto mb-3">  
                        <i class="fa fa-phone fa-2x text-white"></i>  
                    </div>  
                    <p class="mb-2">0378328023</p>  
                    <p class="mb-0">+012 345 67890</p>  
                </div>  
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">  
                    <div class="btn-square mx-auto mb-3">  
                        <i class="fa fa-map-marker-alt fa-2x text-white"></i>  
                    </div>  
                    <p class="mb-2">Số 1 Trịnh Văn Bô</p>  
                    <p class="mb-0">Quận Nam Từ Liêm, Hà Nội</p>  
                </div>  
            </div>  
            <div class="row g-5">  
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">  
                    <h3 class="mb-4">Cần một mẫu liên hệ chức năng?</h3>  
                    <p class="mb-4">Mẫu liên hệ hiện tại không hoạt động. Nhận một mẫu liên hệ chức năng và hoạt động với Ajax & PHP trong vài phút. Chỉ cần sao chép và dán các tệp, thêm một ít mã và bạn đã xong. <a href="https://htmlcodex.com/contact-form">Tải Xuống Ngay</a>.</p>  
                    <form>  
                        <div class="row g-3">  
                            <div class="col-md-6">  
                                <div class="form-floating">  
                                    <input type="text" class="form-control" id="name" placeholder="Tên của bạn">  
                                    <label for="name">Tên của bạn</label>  
                                </div>  
                            </div>  
                            <div class="col-md-6">  
                                <div class="form-floating">  
                                    <input type="email" class="form-control" id="email" placeholder="Email của bạn">  
                                    <label for="email">Email của bạn</label>  
                                </div>  
                            </div>  
                            <div class="col-12">  
                                <div class="form-floating">  
                                    <input type="text" class="form-control" id="subject" placeholder="Chủ đề">  
                                    <label for="subject">Chủ đề</label>  
                                </div>  
                            </div>  
                            <div class="col-12">  
                                <div class="form-floating">  
                                    <textarea class="form-control" placeholder="Để lại tin nhắn ở đây" id="message" style="height: 120px"></textarea>  
                                    <label for="message">Tin nhắn</label>  
                                </div>  
                            </div>  
                            <div class="col-12">  
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Gửi Tin Nhắn</button>  
                            </div>  
                        </div>  
                    </form>  
                </div>  
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">  
                    <div class="h-100">  
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6114.486066280364!2d105.74773175361852!3d21.035169548019834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e1!3m2!1sen!2s!4v1732820126507!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <?php require_once 'views/layouts/footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>

</html>
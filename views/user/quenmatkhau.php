<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Quên Mật Khẩu</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <?php require_once 'views/layouts/link.php'; ?>
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

        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-dark mb-4 animated slideInDown">Quên Mật Khẩu</h1>
                <nav aria-label="breadcrumb" class="animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Quên Mật Khẩu</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Khôi Phục Mật Khẩu</h4>
            </div>
            <div class="card-body">
                <form action="?act=forgot_password" method="post">
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" name="user_email" class="form-control" id="user_email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi Liên Kết Khôi Phục</button>
                </form>
            </div>
        </div>

        <!-- Footer Start -->
        <?php require_once 'views/layouts/footer.php'; ?>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
            <i class="bi bi-arrow-up"></i>
        </a>

        <?php require_once 'views/layouts/lib.php'; ?>
    </body>
    </html>
<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <title>Log in</title>
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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Log in</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                    <li class="breadcrumb-item text-dark" aria-current="page">Log in</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="h-100">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Đăng Nhập</h4>
            </div>
            <div class="card-body">
                <form action="?act=login" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" name="user_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                        <input type="password" name="user_password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ghi nhớ đăng nhập</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                    <a href="?act=forgot_password" class="btn btn-link">Quên mật khẩu?</a>
                </form>
            </div>
        </div>

    <!-- Footer Start -->
    <?php require_once 'views/layouts/footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <?php require_once 'views/layouts/lib.php'; ?>
</body>

</html>
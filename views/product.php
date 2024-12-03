<!DOCTYPE html>  
<html lang="vi">  

<head>  
    <meta charset="utf-8">  
    <title>Sản Phẩm</title>  
    <meta content="width=device-width, initial-scale=1.0" name="viewport">  
    <meta content="" name="keywords">  
    <meta content="" name="description">  
    <style>  
        .product-card {  
            display: flex;  
            flex-direction: column;  
            justify-content: space-between;  
            height: 100%;  
            border: 1px solid #e0e0e0; /* Tùy chọn: Thêm viền để dễ nhìn hơn */  
            border-radius: 8px; /* Tùy chọn: Thêm góc bo tròn */  
            overflow: hidden; /* Đảm bảo không bị tràn */  
            transition: transform 0.2s; /* Tùy chọn: Thêm hiệu ứng hover */  
        }  

        .product-card:hover {  
            transform: scale(1.05); /* Tùy chọn: Phóng to một chút khi hover */  
        }  

        .product-img {  
            width: 100%;  
            height: 200px; /* Chiều cao cố định để đồng nhất */  
            object-fit: cover;  
        }  

        .product-info {  
            flex-grow: 1; /* Điều này giúp phần thông tin chiếm không gian còn lại */  
            display: flex;  
            flex-direction: column;  
            justify-content: space-between;  
            padding: 20px; /* Thêm khoảng cách để dễ nhìn hơn */  
        }  

        /* Các kiểu bổ sung */  
        .container-fluid {  
            padding: 0 15px;  
        }  

        .product-item {  
            height: 100%;  
            display: flex;  
            flex-direction: column;  
        }  

        .product-item .bg-white {  
            flex-grow: 1;  
            display: flex;  
            flex-direction: column;  
            justify-content: space-between;  
        }  
    </style>  

    <?php require_once 'views/layouts/link.php'; ?>  
</head>  

<body>  
    <!-- Spinner Bắt Đầu -->  
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">  
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>  
    </div>  
    <!-- Spinner Kết Thúc -->  

    <!-- Thanh Điều Hướng Bắt Đầu -->  
    <?php require_once 'views/layouts/siderbar.php' ?>  
    <!-- Thanh Điều Hướng Kết Thúc -->  

    <!-- Tiêu Đề Trang Bắt Đầu -->  
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">  
        <div class="container text-center py-5">  
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Sản Phẩm</h1>  
            <nav aria-label="breadcrumb animated slideInDown">  
                <ol class="breadcrumb justify-content-center mb-0">  
                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>  
                    <li class="breadcrumb-item text-dark" aria-current="page">Sản Phẩm</li>  
                </ol>  
            </nav>  
        </div>  
    </div>  
    <!-- Tiêu Đề Trang Kết Thúc -->  

    <!-- Sản Phẩm Bắt Đầu -->  
    <div class="container-fluid product py-5">  
        <div class="container py-5">  
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">  
                <p class="fs-5 fw-medium fst-italic text-primary">Sản Phẩm Của Chúng Tôi</p>  
                <h1 class="display-6">Trà có tác động tích cực phức tạp đến cơ thể</h1>  
            </div>
            <form action="?act=search" method="post">
                <section class="mb-3">
                    <label for="category-select" class="form-label">Tìm theo danh mục:</label>
                    <div class="input-group">
                        <select id="category-select" name="search" class="form-select">
                            <option value="0">Chọn danh mục</option>
                            <?php foreach($category as $cate): ?>
                            <option value="<?= $cate['product_category_id'] ?>"><?= $cate['product_category_name'] ?></option>
                            <?php endforeach; ?>
                            <!-- Thêm các tùy chọn khác nếu cần -->
                        </select>
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </section>
                <?php if (isset($_SESSION['error'])): ?>
                <p class="text-danger"><?= $_SESSION['error'] ?></p>
                <?php endif; ?>
            </form>


            <div class="row">  
                <?php foreach($products as $product): ?>  
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">  
                    <a href="?act=detail&id=<?= $product['product_id'] ?>" class="d-block product-item rounded">  
                        <div class="product-card">  
                            <img src="admin/uploads/img/<?= $product['product_img'] ?>" class="product-img" alt="">  
                            <div class="bg-white shadow-sm text-center product-info">  
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
                        </div>  
                    </a>  
                </div>  
                <?php endforeach; ?>  
            </div>  
        </div>  
    </div>  
    <!-- Sản Phẩm Kết Thúc -->  

    <!-- Chân Trang Bắt Đầu -->  
    <?php require_once 'views/layouts/footer.php'; ?>  
    <!-- Chân Trang Kết Thúc -->  

    <!-- Quay Lên Đầu Trang -->  
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>  

    <?php require_once 'views/layouts/lib.php'; ?>  
</body>  

</html>
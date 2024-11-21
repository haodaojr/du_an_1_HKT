<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail</title>
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
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Detail</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
            <div class="row">  
                    <div class="col-md-6">  
                        <!-- Hình ảnh sản phẩm -->  
                        <img src="admin/uploads/img/<?= $product['product_img'] ?>" class="img-fluid" alt="Tên sản phẩm">  
                    </div>  
                    <div class="col-md-6">  
                        <h1 class="h2"><?= $product['product_name'] ?></h1>  
                        <p class="text-muted"><span class="text-danger">$<?= $product['product_price'] ?></span></p>  
                        <p class="lead"><?= $product['product_description'] ?></p>  
                        
                        <!-- Thêm trường số lượng -->  
                        <div class="d-flex align-items-center mb-3">  
                            <input type="number" class="form-control me-2"  min="1" id="quantity" style="width: 80px;">  
                            <button class="btn btn-primary rounded-pill py-2 px-4">Add to cart</button>  
                        </div>  

                        <hr>  
                        <p><strong>Category:</strong> <?= $product['product_category_name'] ?></p>  
                        <!-- <p><strong>Tags:</strong> 1L, berrino, PHA CHẾ, sinh tố</p>   -->  
                    </div>  

  

                <!-- Phần sản phẩm liên quan -->  
                <div class="related-products">  
                    <h3 class="description-title">Related Products</h3> 
                    <div class="row">  
                    <?php foreach ($product2 as $product): ?>   
                    <div class="col-md-3 mb-4"> <!-- Thêm mb-4 để có khoảng cách giữa các hàng -->  
                        <div class="related-product-card border text-center"> <!-- Thêm text-center để căn giữa -->  
                            <a href="?act=detail&id=<?= $product['product_id'] ?>" class="text-decoration-none text-dark">  
                                <img class="img-fluid" src="admin/uploads/img/<?= $product['product_img'] ?>" alt="<?= $product['product_name'] ?>">  
                                <h5><?= $product['product_name'] ?></h5>  
                                <p class="text-danger">$<?= number_format($product['product_price'], 2) ?></p>  
                            </a>  
                        </div>  
                    </div>   
                    <?php endforeach; ?>
                        
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
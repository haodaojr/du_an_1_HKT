<!doctype html>  
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">  
<head>  
    <meta charset="utf-8" />  
    <title>Sửa sản phẩm | NN Shop</title>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />  
    <meta content="Themesbrand" name="author" />  

    <!-- CSS -->  
    <?php require_once "views/layouts/libs_css.php"; ?>  
</head>  

<body>  
    <!-- Begin page -->  
    <div id="layout-wrapper">  

        <!-- HEADER -->  
         <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->  
        <div class="vertical-overlay"></div>  

        <!-- ============================================================== -->  
        <!-- Start right Content here -->  
        <!-- ============================================================== -->  
        <div class="main-content">  
            <div class="page-content">  
                <div class="container-fluid">  
                    <div class="row">  
                        <div class="col-12">  
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">  
                                <h4 class="mb-sm-0">Quản lý sản phẩm</h4>  
                                <div class="page-title-right">  
                                    <ol class="breadcrumb m-0">  
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>  
                                        <li class="breadcrumb-item active">Sản phẩm</li>  
                                    </ol>  
                                </div>  
                            </div>  
                        </div>  
                    </div>  

                    <div class="row">  
                        <div class="col">  
                            <div class="h-100">  
                                <div class="card">  
                                    <div class="card-header align-items-center d-flex">  
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm sản phẩm</h4>  
                                    </div><!-- end card header -->  

                                    <div class="card-body">  
                                        <div class="live-preview">  
                                            <form action="?act=sua-san-pham" method="POST" enctype="multipart/form-data">  
                                                <div class="row">  
                                                    <!-- Product Name -->  
                                                     <input type="hidden" name="product_id" value="<?= $product['product_id'] ?? '' ?>">
                                                    <div class="col-md-6">  
                                                        <div class="mb-3">  
                                                            <label for="productNameInput" class="form-label">Tên Sản Phẩm</label>  
                                                            <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="product_name" value="<?= $product['product_name'] ?? '' ?>">  
                                                            <span class="text-danger">  
                                                                <?= !empty($_SESSION['errors']['product_name']) ? $_SESSION['errors']['product_name'] : '' ?>  
                                                            </span>  
                                                        </div>  
                                                    </div>  
                                                    <!--end col-->  

                                                    <!-- Category ID -->  
                                                    <div class="col-md-6">  
                                                        <div class="mb-3">  
                                                            <label for="categoryIdInput" class="form-label">Danh Mục</label>  
                                                            <select id="categoryIdInput" class="form-select" name="category_id">
                                                            <option disabled ><?= $product['product_category_name']?></option> 
                                                            <?php foreach($categorys as $category): ?>
                                                                <option value="<?=$category['product_category_id'] ?>"><?=$category['product_category_name'] ?></option>  
                                                            <?php endforeach; ?> 
                                                            </select>  
                                                            <span class="text-danger">  
                                                                <?= !empty($_SESSION['errors']['category_id']) ? $_SESSION['errors']['category_id'] : '' ?>  
                                                            </span>  
                                                        </div>  
                                                    </div>  
                                                    <!--end col-->  

                                                    <!-- Product Image -->  
                                                    <div class="col-md-6">
                                                    <img src="./uploads/img/<?= $product['product_img'] ?>" width="60px" height="50px" alt="Image Description">  
                                                        <div class="mb-3">  
                                                            <label for="productImageInput" class="form-label">Hình Ảnh Sản Phẩm</label>  
                                                            <input type="file" class="form-control" name="product_img2" value="<?= $product['product_img'] ?>">  
                                                            <input type="hidden" class="form-control" name="product_img" value="<?= $product['product_img'] ?>">  
                                                            <span class="text-danger">  
                                                                <?= !empty($_SESSION['errors']['product_img']) ? $_SESSION['errors']['product_img'] : '' ?>  
                                                            </span>  
                                                        </div>  
                                                    </div>  
                                                    <!--end col-->  

                                                    <!-- Product Price -->  
                                                    <div class="col-md-6">  
                                                        <div class="mb-3">  
                                                            <label for="productPriceInput" class="form-label">Giá Sản Phẩm</label>  
                                                            <input type="number" class="form-control" placeholder="Nhập giá sản phẩm" name="product_price" value="<?= $product['product_price'] ?? '' ?>">  
                                                            <span class="text-danger">  
                                                                <?= !empty($_SESSION['errors']['product_price']) ? $_SESSION['errors']['product_price'] : '' ?>  
                                                            </span>  
                                                        </div>  
                                                    </div>  
                                                    <!-- end col -->  

                                                    <!-- Product Amount -->  
                                                    <div class="col-md-6">  
                                                        <div class="mb-3">  
                                                            <label for="productAmountInput" class="form-label">Số Lượng Sản Phẩm</label>  
                                                            <input type="number" class="form-control" placeholder="Nhập số lượng" name="product_amount" value="<?= $product['product_amount'] ?? '' ?>">  
                                                            <span class="text-danger">  
                                                                <?= !empty($_SESSION['errors']['product_amount']) ? $_SESSION['errors']['product_amount'] : '' ?>  
                                                            </span>  
                                                        </div>  
                                                    </div>  
                                                    <!--end col-->  

                                                    <!-- Product Description -->  
                                                    <div class="col-md-12">  
                                                        <div class="mb-3">  
                                                            <label for="productDescriptionInput" class="form-label">Mô Tả Sản Phẩm</label>  
                                                            <textarea class="form-control" placeholder="Nhập mô tả sản phẩm" name="product_description" rows="4"><?= $product['product_description'] ?? '' ?></textarea>  
                                                            <span class="text-danger">  
                                                                <?= !empty($_SESSION['errors']['product_description']) ? $_SESSION['errors']['product_description'] : '' ?>  
                                                            </span>  
                                                        </div>  
                                                    </div>  
                                                    <!--end col-->  

                                                    <!-- Submit Button -->  
                                                    <div class="col-lg-12">  
                                                        <div class="text-left">  
                                                            <button type="submit" class="btn btn-primary">Gửi</button>  
                                                        </div>  
                                                    </div>  
                                                    <!--end col-->  
                                                </div>  
                                                <!--end row-->  
                                            </form>  
                                        </div>  
                                    </div>  
                                </div>  
                            </div> <!-- end .h-100-->  

                        </div> <!-- end col -->  
                    </div>  

                </div>  
                <!-- container-fluid -->  
            </div>  
            <!-- End Page-content -->  

            <footer class="footer">  
                <div class="container-fluid">  
                    <div class="row">  
                        <div class="col-sm-6">  
                            <script>  
                                document.write(new Date().getFullYear())  
                            </script> © Velzon.  
                        </div>  
                        <div class="col-sm-6">  
                            <div class="text-sm-end d-none d-sm-block">  
                                Design & Develop by Themesbrand  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </footer>  
        </div>  
        <!-- end main content-->  

    </div>  
    <!-- END layout-wrapper -->  

    <!--start back-to-top-->  
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">  
        <i class="ri-arrow-up-line"></i>  
    </button>  
    <!--end back-to-top-->  

    <!--preloader-->  
    <div id="preloader">  
        <div id="status">  
            <div class="spinner-border text-primary avatar-sm" role="status">  
                <span class="visually-hidden">Loading...</span>  
            </div>  
        </div>  
    </div>  

    <div class="customizer-setting d-none d-md-block">  
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">  
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>  
        </div>  
    </div>  

    <!-- JAVASCRIPT -->  
    <?php  
    require_once "views/layouts/libs_js.php";  
    ?>  

</body>  

</html>
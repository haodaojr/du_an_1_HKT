<!doctype html>
    <html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
    <head>
        <meta charset="utf-8" />
        <title>Thêm Danh Mục</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <!-- CSS -->
        <?php require_once "views/layouts/libs_css.php"; ?>
        <style>
            form img{
                width:300px ;
            }
        </style>
    </head>
    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- HEADER -->
            <?php
            require_once "views/layouts/header.php";
            require_once "views/layouts/siderbar.php";
            ?>
            
            <div class="vertical-overlay"></div>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                    <h4 class="mb-sm-0">Thêm Danh Mục</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Thêm danh mục</li>
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
                                            <h4 class="card-title mb-0 flex-grow-1">Thêm Danh Mục</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="live-preview">
                                                <h1>Sua Danh Mục</h1>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <?php
                                                        if ($onecate) {
                                                            // Tiếp tục truy cập $onecate['product_category_id'] và $onecate['product_category_name']
                                                        } else {
                                                            echo "Danh mục không tồn tại.";
                                                            // Có thể chuyển hướng hoặc xử lý lỗi
                                                        } 
                                                    ?>
                                                <div class="mb-3">
                                                        <label for="product_category_id" class="form-label">Id Danh Mục:</label>
                                                        <input type="text" id="product_category_id" name="product_category_id" value= "<?= $onecate['product_category_id'] ?>" class="form-control" placeholder="Tên Danh Mục" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_category_name" class="form-label">Tên Danh Mục:</label>
                                                        <input type="text" id="product_category_name" name="product_category_name" value= "<?= $onecate['product_category_name'] ?>" class="form-control" placeholder="Tên Danh Mục" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_category_name" class="form-label">Anh Danh Mục:</label><br>
                                                        <img src="./uploads/img/<?= $onecate['product_category_img'] ?>" alt="" >
                                                        <input type="file" id="product_category_img" name="product_category_img" class="form-control" placeholder="Tên Danh Mục" required>
                                                    </div>
                                                    <button type="submit" name="update" class="btn btn-primary">Sua Danh Mục</button>
                                                    <a href="?act=list_cate"><input type="text" class="btn btn-primary" value="Danh Sách Danh Mục"></a>
                                                </form>
                                            </div>
                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
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
        <?php require_once "views/layouts/libs_js.php"; ?>
    </body>
    </html>
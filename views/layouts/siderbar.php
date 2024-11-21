<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
            <a href="?act=/" class="navbar-brand">
                <img class="img-fluid" src="assets/img/logo.png" alt="Logo">
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="?act=/" class="nav-item nav-link" id="home" onclick="setActivePage('home')">Home</a>
                    <a href="?act=about" class="nav-item nav-link" id="about" onclick="setActivePage('about')">About</a>
                    <a href="?act=product" class="nav-item nav-link" id="product"
                        onclick="setActivePage('product')">Products</a>
                    <a href="?act=store" class="nav-item nav-link" id="store" onclick="setActivePage('store')">Store</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light rounded-0 m-0">
                            <a href="?act=feature" class="dropdown-item" id="feature"
                                onclick="setActivePage('feature')">Features</a>
                            <a href="?act=blog" class="dropdown-item" id="blog" onclick="setActivePage('blog')">Blog
                                Article</a>
                            <a href="?act=testimonial" class="dropdown-item" id="testimonial"
                                onclick="setActivePage('testimonial')">Testimonial</a>
                            <a href="?act=404" class="dropdown-item" id="404" onclick="setActivePage('404')">404
                                Page</a>
                        </div>
                    </div>
                    <a href="?act=contact" class="nav-item nav-link" id="contact"
                        onclick="setActivePage('contact')">Contact</a>
                </div>
                <div class="border-start ps-4 d-none d-lg-block">
                    <div class="input-group">
                        <input type="text" id="searchInput" name="kyw" class="form-control" placeholder="Search...">
                        <button type="button" name="search" class="btn btn-sm btn-outline-secondary" onclick="search()">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<script>
    // Hàm này sẽ thay đổi class "active" cho các mục trong nav
    function setActivePage(pageId) {
        const links = document.querySelectorAll('.navbar-nav .nav-link, .dropdown-menu .dropdown-item');
        links.forEach(link => {
            link.classList.remove('active');
        });
        const activeLink = document.getElementById(pageId);
        if (activeLink) {
            activeLink.classList.add('active');
        }
    }

    // Hàm tìm kiếm
    function search() {
        const query = document.getElementById('searchInput').value;
        if (query) {
            window.location.href = `?act=product&kyw=${encodeURIComponent(query)}`;
        } else {
            alert("Please enter a search term.");
        }
    }

    // Set trạng thái active cho trang hiện tại nếu đã có class active
    document.addEventListener("DOMContentLoaded", function () {
        const currentPage = window.location.search.split('=')[1];
        if (!currentPage || currentPage === '/') {
            setActivePage('home');
        } else {
            setActivePage(currentPage);
        }
    });
</script>
<?php 

class HomeController
{
    public function home() {
      require_once 'views/home.php';  
    }
    public function about() {
      require_once 'views/about.php';  
    }
    public function store(){
      require_once 'views/store.php';
    }
    public function contact(){
      require_once 'views/contact.php';
    }
    public function feature(){
      require_once 'views/feature.php';
    }
    public function testimonial(){
      require_once 'views/testimonial.php';
    }
    public function product(){
      require_once 'views/product.php';
    }
    public function t404(){
      require_once 'views/404.php';
    }
    public function blog(){
      require_once 'views/blog.php';
    }
}
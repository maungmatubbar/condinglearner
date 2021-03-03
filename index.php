<?php
    require'./vendor/autoload.php';
    $obj_application = new App\classes\Application();
    
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog for knowladge</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/front-end/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/front-end/css/blog-home.css" rel="stylesheet">
    <link href="assets/front-end/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/front-end/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/front-end/fontawesome/css/solid.css" rel="stylesheet">
    <!-- script file -->
    <script defer src="assets/front-end/fontawesome/js/brands.js"></script>
    <script defer src="assets/front-end/fontawesome/js/solid.js"></script>
    <script defer src="assets/front-end/fontawesome/js/fontawesome.js"></script>
    <script src="http://code.jquery.com/jquery.min.js"></script>
  </head>

  <body>

    <!-- Navigation -->
      <?php include'./includes/menubar.php';?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- slider  -->
          <?php
            if(isset($pages)){
                if($pages == 'aboutus.php'){
                    include'./pages/aboutus_content.php';
                }
                else if($pages == 'single_post.php'){
                  include'./pages/single_post_content.php';
              }
              else if($pages == 'categories.php'){
                include'./pages/categories_content.php';
              }
              else if($pages == 'contact.php'){
                include'./pages/contact_content.php';
              }
            }else{
              include'./pages/home_content.php';
            }
          ?>

        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <?php include'./includes/searchbar.php';?>
          <?php

            if(isset($pages)){
                if($pages == 'single_post.php'){
                include'./pages/single_post_sidebar.php';
              }
              else if($pages == 'categories.php'){
                include'./pages/single_post_sidebar.php';
              }
            }
            else{
                include'./sidebar.php';
            }
          
          ?>
        </div>
      <!-- /.row -->
      </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5" style="background:#0c2c84">
      <div class="container">
          <div class="text-center">
            <h3>
              <a href="#" class="text-light"><i class="fab fa-facebook-square"></i></a>
              <a href="#"  class="text-light"><i class="fab fa-twitter-square"></i></a>
              <a href="#"  class="text-light"><i class="fab fa-youtube-square"></i></a>
              <a href="#"  class="text-light"><i class="fab fa-instagram-square"></i></a>
            </h3>
          </div>
          <hr style="background-color:#E3F2FD">
        <p class="m-0 text-center text-white">Copyright &copy; Codinglearner.All Rights Reserved 2020</p>
        <p class="m-0 text-center text-warning">Powered by Create Ecommerce</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->

    <script src="assets/front-end/jquery/jquery.min.js"></script>
    <script src="assets/front-end/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lazyload/ajax.jquery.min.js" charset="utf-8"></script>
    <script src="assets/lazyload/jquery.lazyload.js" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $("img").lazyload({
                effect : "fadeIn"
            });
        });
    </script> 
  </body>

</html>

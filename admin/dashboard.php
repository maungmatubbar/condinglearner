<?php
ob_start();
    session_start();
    if($_SESSION['id']==null){
        header('Location:index.php');
    }

    $message ="";
    require_once'../vendor/autoload.php';
    $login = new App\classes\Logout();
    $obj_category = new App\classes\Category();
    $obj_tag = new App\classes\Tag();
    $obj_post = new App\classes\Post();
    if(isset($_GET['logout'])){
        $login->adminLogout();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <!-- stylesheet  -->
        <link href="../assets/back-end/css/styles.css" rel="stylesheet" />
        <link href="../assets/back-end/css/dataTable.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="../assets/back-end/js/fontawesome.js" crossorigin="anonymous"></script>
        <script src="../assets/back-end/ckeditor/ckeditor.js" crossorigin="anonymous"></script>
        <script src="../assets/back-end/ckeditor/samples/js/sample.js" crossorigin="anonymous"></script>
        <link href="../assets/back-end/ckeditor/samples/css/samples.css" rel="stylesheet" />
        
    </head>
    <body class="sb-nav-fixed">
        <?php include'includes/header.php';?>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include'includes/menu.php'?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <?php 
                        if(isset($pages)){
                            if($pages=='add_category.php'){
                                include'./pages/add_category_content.php';
                            }
                            else if ($pages == 'manage_category.php'){
                                include'./pages/manage_category_content.php';
                            }
                            else if ($pages == 'edit_category.php'){
                                include'./pages/edit_category_content.php';
                            }
                            else if ($pages == 'add_tag.php'){
                                include'./pages/add_tag_content.php';
                            }
                            else if ($pages == 'manage_tag.php'){
                                include'./pages/manage_tag_content.php';
                            }
                            else if ($pages == 'edit_tag.php'){
                                include'./pages/edit_tag_content.php';
                            }
                            else if ($pages == 'add_post.php'){
                                include'./pages/add_post_content.php';
                            }
                            else if ($pages == 'manage_post.php'){
                                include'./pages/manage_post_content.php';
                            }
                            else if ($pages == 'view_post.php'){
                                include'./pages/view_post_content.php';
                            }
                            else if ($pages == 'edit_post.php'){
                                include'./pages/edit_post_content.php';
                            }
                            else if ($pages == 'admin_info.php'){
                                include'./pages/admin_info_content.php';
                            }
                        }
                        else{
                            include'./pages/home_content.php';
                        }
                    ?>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Basic Blog <?php echo date('Y');?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       
        <script src="../assets/back-end/js/jquery.js" crossorigin="anonymous"></script>
        <script src="../assets/back-end/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/back-end/js/scripts.js"></script>
        <script src="../assets/back-end/js/chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/back-end/assets/demo/chart-area-demo.js"></script>
        <script src="../assets/back-end/assets/demo/chart-bar-demo.js"></script>
        <script src="../assets/back-end/js/dataTable.js" crossorigin="anonymous"></script>
        <script src="../assets/back-end/js/datatable.bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../assets/back-end/assets/demo/datatables-demo.js"></script>
        <script src="../assets/back-end/filepond-master/dist/filepond.js"></script>
        <script>
            initSample();
         </script>
        <script>
            var alertList = document.querySelectorAll('.alert')
            alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
            })
        </script>
    </body>
</html>

<?php
    session_start();

    require_once "../vendor/autoload.php";
    $message="";
    if(isset($_SESSION['id'])){
        header('Location:dashboard.php');
    }
    if(isset($_POST['btn'])){
        $login = new App\classes\Login();
        $message = $login->adminLoginCheck($_POST);
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
        <title>Admin Panel Login</title>
        <link href="../assets/back-end/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-white">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header "><h4 class="text-center font-weight-light my-4">
                                        <strong><i class="fas fa-user"></i> Admin login</strong></h4>
                                        <?php if($message!=null){?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <p><?php echo $message; ?></p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="card-body">
                                        <form class="horizontal" action="" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"><i class="fas fa-envelope"></i> Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Enter email address" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword"><i class="fas fa-lock"></i> Password</label>
                                                <input class="form-control py-4" id="inputPassword"
                                                name="password" type="password" placeholder="Enter password" required/>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button type="submit" name="btn" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                    <a href="/basicblog">Back to Home</a>
                                       <b>Basic Blog</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Basic Blog 2021</div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/back-end/js/scripts.js"></script>
    </body>
</html>

<?php
include '../../vendor/autoload.php';

use App\Controller\LoginController;

//session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $loginController = new LoginController();
    if (!$loginController->getLogin()) {
        $error = 'Wrong name and password';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Login User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="lg/css/style.css">
</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-mb-6 text-center mb-5">
                <h2 class="heading-section">User Login</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Sign in</h3>
                        </div>
                        <div class="w-100">
                            <p class="social-media d-flex justify-content-end">
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-facebook"></span></a>
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-twitter"></span></a>
                            </p>
                        </div>
                    </div>
                    <form class="login-form" method="post">
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-user"></span></div>
                            <input type="text" class="form-control rounded-left" placeholder="Username" required
                                   name="name">
                        </div>
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-lock"></span></div>
                            <input type="password" name="password" class="form-control rounded-left"
                                   placeholder="Password" required>
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <div class="w-100">
                                <label class="checkbox-wrap checkbox-primary mb-0">Save Password
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-100 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary rounded submit">Login</button>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <div class="w-100 text-center">
                                <p class="mb-1">Don't have an account? <a href="../../index.php?page=user&action=register">Sign Up</a></p>
                                <p><a href="#">Forgot Password</a></p>
                            </div>
                        </div>
                        <div>
                            <?php if (isset($error)) {
                                echo "<p class='alert alert-danger'>$error</p>";
                            } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="lg/js/jquery.min.js"></script>
<script src="lg/js/popper.js"></script>
<script src="lg/js/bootstrap.min.js"></script>
<script src="lg/js/main.js"></script>
</body>
</html>
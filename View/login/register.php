<?php
include '../../vendor/autoload.php';

use App\Controller\LoginController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new LoginController();
    if ($_REQUEST['password'] == $_REQUEST['re_password']) {
        $controller->register();
    } else {
        $error = 'Password must be the same';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register</title>
    <link rel="stylesheet" href="register/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="register/css/style.css">
    <style type="text/css" data-styled-components="FiaaB gTcftA caPIRE" data-styled-components-is-local="true">
        /* sc-component-id: sc-keyframes-FiaaB */
        @-webkit-keyframes FiaaB {
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes FiaaB {
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        /* sc-component-id: sc-keyframes-gTcftA */
        @-webkit-keyframes gTcftA {
            10%, 90% {
                -webkit-transform: translate3d(-1px, 0, 0);
                -ms-transform: translate3d(-1px, 0, 0);
                transform: translate3d(-1px, 0, 0);
            }
            20%, 80% {
                -webkit-transform: translate3d(2px, 0, 0);
                -ms-transform: translate3d(2px, 0, 0);
                transform: translate3d(2px, 0, 0);
            }
            30%, 50%, 70% {
                -webkit-transform: translate3d(-4px, 0, 0);
                -ms-transform: translate3d(-4px, 0, 0);
                transform: translate3d(-4px, 0, 0);
            }
            40%, 60% {
                -webkit-transform: translate3d(4px, 0, 0);
                -ms-transform: translate3d(4px, 0, 0);
                transform: translate3d(4px, 0, 0);
            }
        }

        @keyframes gTcftA {
            10%, 90% {
                -webkit-transform: translate3d(-1px, 0, 0);
                -ms-transform: translate3d(-1px, 0, 0);
                transform: translate3d(-1px, 0, 0);
            }
            20%, 80% {
                -webkit-transform: translate3d(2px, 0, 0);
                -ms-transform: translate3d(2px, 0, 0);
                transform: translate3d(2px, 0, 0);
            }
            30%, 50%, 70% {
                -webkit-transform: translate3d(-4px, 0, 0);
                -ms-transform: translate3d(-4px, 0, 0);
                transform: translate3d(-4px, 0, 0);
            }
            40%, 60% {
                -webkit-transform: translate3d(4px, 0, 0);
                -ms-transform: translate3d(4px, 0, 0);
                transform: translate3d(4px, 0, 0);
            }
        }

        /* sc-component-id: sc-keyframes-caPIRE */
        @-webkit-keyframes caPIRE {
            0% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            20% {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }
            40% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            60% {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }
            80% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            100% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
        }

        @keyframes caPIRE {
            0% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            20% {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }
            40% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            60% {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }
            80% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            100% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
        }</style>
    <link rel="shortcut icon" href="../../img/photo-collage.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
</head>
<body>
<div class="main">
    <section class="signup">
        <!--        <img src="../../img/photo-collage.png" alt="">-->
        <div class="container">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                    <h2 class="form-title">Create account</h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="name" id="name" placeholder="Your Name">
                    </div>
                    <?php if (isset($false)) {
                        echo "<p class='alert alert-danger'>$false</p>";
                    } ?>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password">
                        <!--                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>-->
                    </div>
                    <?php if (isset($false)) {
                        echo "<p class='alert alert-danger'>$false</p>";
                    } ?>
                    <div class="form-group">
                        <input type="password" class="form-input" name="re_password" id="re_password"
                               placeholder="Repeat your password">
                        <?php if (isset($error)) {
                            echo "<p class='alert alert-danger'>$error</p>";
                        } ?>
                    </div>

                    <!--                    <div class="form-group">-->
                    <!--                        <input type="file" class="form-input" name="img" id="email" placeholder="Your Avatar">-->
                    <!--                    </div>-->
                    <!--                    <div class="form-group">-->
                    <!--                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term">-->
                    <!--                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all-->
                    <!--                            statements in <a href="#" class="term-service">Terms of service</a></label>-->
                    <!--                    </div>-->
                    <div class="form-group">
                        <button type="submit" class="form-submit">Register</button>
                    </div>
                </form>
                <p class="loginhere">
                    Have already an account ? <a href="../../index.php?page=user&action=login" class="loginhere-link">Login
                        here</a>
                </p>
            </div>
        </div>
    </section>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="register/vendor/jquery/jquery.min.js"></script>
<script src="register/js/main.js"></script>
</html>
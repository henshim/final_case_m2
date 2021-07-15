<?php session_start();
if (isset($_REQUEST['page'])) {
    $pages = array('product','cart');
    if (in_array($_REQUEST['page'],$pages)) {
        $_page = $_REQUEST['page'];
    }else{
        $_page ='product';
    }
}else{
    $_page ='products';
}
ob_start(); ?>
    <!doctype html>
    <html lang="en">
<head>
    <title>Trading Card Shop H</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
    <link rel="stylesheet" href="core/main.css">
    <link rel="shortcut icon" href="img/photo-collage.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
</head>
<body class="background" style="background-color: gainsboro">
<div class="container" style="height: auto" id="header">
    <header class="row">
        <!--        <div class="row" style="width=100px;height=150px">-->
        <!--            <img src="img/photo-collage.png" style="float: left;" alt="">-->
        <!--        </div>-->
        <div class="col-12 col-md-12 shopping-mall " style="text-align: center">
            <h1>Trading Card Shop H</h1>
            <h4>The best card shop in Ha Noi</h4>
        </div>
    </header>
    <?php include 'View/layout/nav.php' ?>
</div>
<div class="container" style="height: auto">`
    <div class="row">
        <aside class="col-12 col-sm-3">
            <?php include 'View/layout/sidebar.php' ?>
        </aside>
        <article class="col-12 col-sm-9 mt-2">
            <div class="col-12 col-sm-12 row mb-2" style="height: 700px;">
                <?php include 'router.php' ?>
            </div>
        </article>
        <!--        <aside class="col-12 col-sm-3">-->
        <!--            --><?php //include 'sidebar.php'?>
        <!--        </aside>-->
    </div>
</div>
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
</body>
    </html><?php

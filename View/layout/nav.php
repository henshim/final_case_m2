<?php $page = $_REQUEST['page'] ?? null;
//session_start();
//$login = $_SESSION['userLogin'] ?? null ?>
    <nav class="navbar navbar-expand-xl navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <?php switch ($page) {
                case 'sale' : ?>Featured Product
                    <?php break; ?>
                <?php case 'product' : ?>Product Manager<?php break; ?>
                <?php default : ?>Home <?php } ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <!--<a class="nav-link" href="#">Giới thiệu</a>-->
                </li>
                <?php if (isset($_SESSION['userLogin'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=sale&action=sale-list">Product Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=product&action=list">Product Manager</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=<?php if (isset($_SESSION['userLogin'])) { ?>product<?php } else { ?>sale<?php } ?>&action=category&category=YuGiOh">YuGiOh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=<?php if (isset($_SESSION['userLogin'])) { ?>product<?php } else { ?>sale<?php } ?>&action=category&category=Battle Spirits">Battle
                            Spirits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=<?php if (isset($_SESSION['userLogin'])) { ?>product<?php } else { ?>sale<?php } ?>&action=category&category=Cardfight Vanguard">Cardfight
                            Vanguard</a>
                    </li>
                <?php } ?>
                <!--            <li class="nav-item dropdown">-->
                <!--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"-->
                <!--                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--                    Product Manager-->
                <!--                </a>-->
                <!--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
                <!--                    <a class="dropdown-item" href="index.php?page=product&action=list">List</a>-->
                <!--                    <a class="dropdown-item" href="index.php?page=product&action=add">Add product</a>-->
                <!--                    <a class="dropdown-item" href="index.php?page=product&action=statistical"></a>-->
                <!--                </div>-->
                <!--            </li>-->
                <div class="form-inline my-2 my-lg-0">
                    <form class="form-inline my-2 my-lg-0" method="post"
                          action="index.php?page=<?php if (isset($_SESSION['userLogin'])) { ?>product<?php } else { ?>sale <?php } ?>&action=search">
                        <input class="form-control mr-sm-2" type="search" placeholder="Từ khoá" aria-label="Search"
                               name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>
                </div>
                <div class="row">
                    <div style="margin-left: 100px">
                        <?php if (isset($_SESSION['userLogin'])) { ?>
                            <li class="nav-item">
                                <a href="" class="nav-link disabled"><?php //$user['name'] ?></a>
                            </li>
                            <div class=" col-12">
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img width='20px' src="img/default-avatar.jpg" alt="loi anh">
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <!-- <a class="dropdown-item" href="index.php?page=user&action=list">Thông tin cá
                                            nhân </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="index.php?page=user&action=register-view">Đăng ký
                                            thành
                                            viên</a>
                                        <a class="dropdown-item" href="index.php?page=user&action=edit">Cập nhật hồ
                                            sơ</a> -->
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="index.php?page=user&action=logout">Đăng xuất</a>
                                    </div>
                                </li>
                            </div>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="index.php?page=user&action=login" class="btn btn-outline-primary nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=user&action=register"
                                   class="btn btn-outline-secondary nav-link">Register</a>
                            </li>
                        <?php } ?>
                    </div>
                </div>
            </ul>
            <a href="index.php?page=cart&action=list"><i class="fa fa-shopping-cart"
                                                         aria-hidden="true"></i><sup><?php //count($_SESSION['cart']); ?></sup></a>
        </div>
    </nav>
<?php

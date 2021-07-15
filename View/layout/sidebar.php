<div class="card poly-cart">
    <div class="card-body row">
        <p class="col-sm-9"><?php //include "View/core/count.php" ?></p>
        <?php if (isset($_SESSION['userLogin'])) { ?>
            <div>
            <a href="index.php?page=product&action=add" class="btn btn-primary">Add Product</a>
            </div>
            <div class="btn-group">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Sort category
                </button>
                <div class="dropdown-menu">
                    <a class='dropdown-item' href="index.php?page=<?php if (isset($_SESSION['userLogin'])) { ?>product<?php } else { ?>sale<?php } ?>&action=category&category=YuGiOh">YuGiOh</a>
                    <a class='dropdown-item' href="index.php?page=<?php if (isset($_SESSION['userLogin'])) { ?>product<?php } else { ?>sale<?php } ?>&action=category&category=Battle Spirits">Battle
                        Spirits</a>
                    <a class='dropdown-item' href="index.php?page=<?php if (isset($_SESSION['userLogin'])) { ?>product<?php } else { ?>sale<?php } ?>&action=category&category=Cardfight Vanguard">Cardfight
                        Vanguard</a>
                </div>
            </div>
            <!--        <div class="btn-group">-->
            <!--            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown"-->
            <!--                    aria-haspopup="true" aria-expanded="false">-->
            <!--                Sort price-->
            <!--            </button>-->
            <!--            <div class="dropdown-menu">-->
            <!--                <a class='dropdown-item'-->
            <!--                   href="index.php?page=--><?php //if (isset($_SESSION['userLogin'])) { ?><!--product--><?php //} else { ?><!--sale --><?php //} ?><!--&action=sort&sort=asc">Small-->
            <!--                    to big</a>-->
            <!--                <a class='dropdown-item'-->
            <!--                   href="index.php?page=--><?php //if (isset($_SESSION['userLogin'])) { ?><!--product--><?php //} else { ?><!--sale --><?php //} ?><!--&action=sort&sort=desc">Big-->
            <!--                    to small</a>-->
            <!--            </div>-->
        <?php } else { ?>
            <img src="img/photo-collage2.jpg" width="250px" alt="trading card shop H">
        <?php } ?>
    </div>

    <div class="btn-group">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Sort price
        </button>
        <div class="dropdown-menu">
            <a class='dropdown-item'
               href="index.php?page=<?php if (isset($_SESSION['userLogin'])) { ?>product<?php } else { ?>sale<?php } ?>&action=sort&sort=asc">Small
                to big</a>
            <a class='dropdown-item'
               href="index.php?page=<?php if (isset($_SESSION['userLogin'])) { ?>product<?php } else { ?>sale<?php } ?>&action=sort&sort=desc">Big
                to small</a>
        </div>
    </div>
</div>

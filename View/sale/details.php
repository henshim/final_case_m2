<div class="container" style="float: left ;">
    <div class="row">
        <div class="col-sm">
            <img src="img/<?php echo $product['img'] ?>" width='150px' height="250px" alt="">
        </div>
        <div class="col-sm">
            <strong>
                <p style="font-size: 50px"><?php echo $product['name'] ?></p>

                <p style="font-size: 18px; color: green;"><?php echo number_format($product['price']) ?> VND</p>

                <p><?php echo $product['amount'] ?></p>

                <p style="font-size: 20px"><?php echo $product['description'] ?></p>

                <a href="index.php?page=cart&action=add&id=<?php echo $product['id'] ?>" class="btn btn-success">Add to cart</a>
            </strong>
        </div>
    </div>
</div>
<?php foreach ($products as $product): ?>
    <div class="col-sm-4">
        <div class="card text-center">
            <div class="">
                <div class="card text-center">
                    <div class="card-header">
                        <img src="img/<?php echo $product['img'] ?>" alt="" width="100px" height="150px">
                    </div>
                    <div class="card-header">
                        <?php echo $product['name'] ?>
                    </div>
                    <div class="card-header">
                        <?php echo number_format($product['price']) ?> VND
                    </div>
                    <div class="card-header">
                        <?php echo $product['amount'] ?>
                    </div>
                    <div class="card-header">
                        <?php echo $product['cateName'] ?>
                    </div>
                    <div class="card-header">
                        <?php echo $product['supName'] ?>
                    </div>
                </div>
            </div>
            <?php //echo '<pre>'; var_dump($product); die(); ?>
            <a href="index.php?page=product&action=update&id=<?php echo $product['id'] ?>"
               class="btn btn-warning">Update</a>
            <a href="index.php?page=product&action=delete&id=<?php echo $product['id'] ?>"
               class="btn btn-danger" onclick="return confirm('Are you sure about that?')">Delete</a>
        </div>
    </div>
<?php endforeach ?>

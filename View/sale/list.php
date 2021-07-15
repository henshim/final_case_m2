<?php
if (isset($message)){
    echo "<p class='alert alert-danger'>$message</p>";
}
?>
<table class="table">
    <?php foreach ($products as $product): ?>
        <thead>
        <tr>
            <td><img src="img/<?php echo $product['img'] ?>" alt="" width="100px" height="150px"></td>
            <td>
                <a href="index.php?page=sale&action=detail&id=<?php echo $product['id'] ?>" style="text-decoration: none">
                    <div class="card-body"><?php echo $product['name']; ?></div>
                    <div class="card-body"><?php echo number_format($product['price']); ?> VND</div>
                </a>
                <div class="card-body"><input type="number" value="1" name="quantity" style="width=10px"></div>
            </td>
            <td>
                <a href="index.php?page=cart&action=add&id=<?php echo $product['id'] ?>" class="btn btn-success">Add to
                    cart</a>
            </td>
        </tr>
        </thead>
    <?php endforeach; ?>
</table>
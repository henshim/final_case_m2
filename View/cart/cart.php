<?php
namespace App\Controller\LoginController;

use App\Mid\Login;

//include '../../vendor/autoload.php';

//session_start();
$login = new Login();
$login->isLogin();

?>
<form action="index.php?page=cart&action=add" method="post">
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Img</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price Each</th>
            <th>Total price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($carts as $cart): ?>
            <tr>
                <td><img src="img/<?php echo $cart['img'] ?>" width="100" alt=""></td>
                <td class="scope"><?php echo $cart['name'] ?></td>
                <td><input type="text" name="quantity[<?php echo $cart['id'] ?>]" size="5"
                           value="<?php echo $_SESSION['cart'][$cart['id']]['quantity'] ?>"></td>
                <td><?php echo number_format($cart['price']) ?></td>
                <td><?php echo $_SESSION['cart'][$cart['id']]['quantity'] * $cart['price'] ?>VND</td>
                <td>
                    <a class="btn btn-warning" href="index.php?page=cart&action=update&id=<?php echo $cart->id ?>">
                        <i class="fa fa-pencil-square"></i>
                    </a>
                    <a class="btn btn-danger" href="index.php?page=cart&action=delete&id=<?php echo $cart->id ?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5">Total Price: <?php echo $totalPrice ?></td>
        </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-success" name="submit">Update Cart</button>
</form>
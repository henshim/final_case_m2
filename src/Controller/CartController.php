<?php


namespace App\Controller;

//use App\Model\cart\Cart;

use App\Model\CartModel;
use App\Model\ProductModel;

class CartController
{
    public $cartModel;
    public $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->cartModel = new CartModel();
    }

    public function index()
    {
        $carts = $this->cartModel->getCart();
        include 'View/cart/cart.php';
    }

    public function add()
    {
        /*$id = $_GET['id'] ?? null;
        $product = $this->productModel->get($id);

        // $_SESSION['cart'][$id] = $product;
        //session_destroy();
        if (empty($_SESSION['cart']) || !array_key_exists($id, $_SESSION['cart'])) {
            $product->amount = 1;
            $_SESSION['cart'][$id] = $product;
            //echo 'not have in cart';
        } else {
            $product['amount'] = $_SESSION['cart'][$id]['amount'];
            $_SESSION['cart'][$id] = $product;
        }
        header('Location: index.php?page=cart&action=list');*/

        if (isset($_GET['action']) && $_GET['action'] == 'add') {
            $id = intval($_GET['id']);
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity']++;
            } else {
                $cart = $this->productModel->get($id);
                if ($cart != 0) {
                    $row = mysqli_fetch_array($cart);
                    $_SESSION['cart'][$row['id']] = array('quantity' => 1, 'price' => $row['price']);
                } else {
                    $message = 'This product id is invalid';
                }
            }
        }
    }
}
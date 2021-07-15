<?php


namespace App\Model;

use App\Model\Database;
use PDO;

class CartModel
{
    public $conn;

    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->connect();
    }

    public function getCart()
    {
        $sql = "select * from v_product where id in (";
        foreach ($_SESSION['cart'] as $id => $value) {
            $sql .= $id . ',';
        }
        $sql = substr($sql, 0, -1) . ") order by name asc";
        $stmt = $this->conn->query($sql);
        $totalPrice = 0;
        $stmt->execute();
        while ($row = $stmt->fetchAll()) {
            $subTotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['price'];
            $totalPrice += $subTotal;
        }
    }

    public function add($cart)
    {
        $sql = "insert into cart(quantity,product_id) value(?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $cart['quantity']);
        $stmt->bindParam(2, $cart['productName']);
        //$stmt->bindParam(3, $cart['img']);
        return $stmt->execute();
    }

    public function update($cart)
    {
        $sql = "update cart set quantity = ? where id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $cart['quantity']);
        $stmt->bindParam(2, $cart['id']);
        return $stmt->execute();
    }

    public function count($count)
    {
        $sql = "select count(id)+$count from v_cart";
        $stmt = $this->conn->query($sql);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "delete from cart where id = $id";
        $stmt = $this->conn->query($sql);
        return $stmt->execute();
    }
}
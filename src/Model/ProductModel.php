<?php

namespace App\Model;

use PDO;

class ProductModel
{
    public $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM v_product order by id desc";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function getCate()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getSup()
    {
        $sql = "SELECT * FROM suppliers";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function get($id)
    {
        $sql = "SELECT * FROM v_product where id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function add($product)
    {
        $sql = "INSERT INTO products(name,price,amount,description,cate_id,supply_id,img) values (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $product['name']);
        $stmt->bindParam(2, $product['price']);
        $stmt->bindParam(3, $product['amount']);
        $stmt->bindParam(4, $product['description']);
        $stmt->bindParam(5, $product['cateName']);
        $stmt->bindParam(6, $product['supName']);
        $stmt->bindParam(7, $product['img']);
        return $stmt->execute();
    }

    public function update($product)
    {
        if ($product['img'] == '') {
            $sql = "UPDATE products SET name = ?, price = ?, amount = ?, description=?, cate_id=?, supply_id = ? where id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $product['name']);
            $stmt->bindParam(2, $product['price']);
            $stmt->bindParam(3, $product['amount']);
            $stmt->bindParam(4, $product['description']);
            $stmt->bindParam(5, $product['cateName']);
            $stmt->bindParam(6, $product['supName']);
            $stmt->bindParam(7, $product['id']);
            return $stmt->execute();
        } else {
            $sql = "UPDATE products SET name = ?, price = ?, amount = ?, description = ?, cate_id = ?,supply_id = ?,img = ? where id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $product['name']);
            $stmt->bindParam(2, $product['price']);
            $stmt->bindParam(3, $product['amount']);
            $stmt->bindParam(4, $product['description']);
            $stmt->bindParam(5, $product['cateName']);
            $stmt->bindParam(6, $product['supName']);
            $stmt->bindParam(7, $product['img']);
            $stmt->bindParam(8, $product['id']);
            return $stmt->execute();
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function search($search)
    {
        $sql = "SELECT * FROM v_product WHERE name like '$search%'";
        $stmt = $this->conn->query($sql);
        //$stmt->bindParam(1, $search);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProByCate($cate)
    {
        $sql = "SELECT * FROM v_product WHERE cateName = '$cate'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProBySup($sup)
    {
        $sql = "SELECT * FROM v_product WHERE supName = '$sup'";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function sort($sort)
    {
        $sql = "select * from v_product order by price $sort";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
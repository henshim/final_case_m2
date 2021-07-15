<?php

namespace App\Controller;

use App\Model\ProductModel;

class ProductController
{

    public $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function show()
    {
        $products = $this->productModel->getAll();
        include 'View/product/list.php';
    }

    public function sale()
    {
        $products = $this->productModel->getAll();
        include 'View/sale/list.php';
    }

    public function img()
    {
        $targetDir = 'img/';
        $targetName = basename($_FILES['img']['name']);
        $targetFile = $targetDir . $targetName;
        move_uploaded_file($_FILES['img']['tmp_name'], $targetFile);
        return $targetName;
    }

    public function error()
    {
        $errors = [];
        $fields = ['name', 'price', 'amount', 'description'];
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $errors[$field] = 'Must have values';
            }
        }
        return $errors;
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $cates = $this->productModel->getCate();
            $sups = $this->productModel->getSup();
            include 'View/product/add.php';
        } else {
            $error = $this->error();
            if (empty($error)) {
                $_REQUEST['img'] = $this->img();
//                $product = new Product($_REQUEST);
                $this->productModel->add($_REQUEST);
                header('Location: index.php?page=product&action=list');
            } else {
                $cates = $this->productModel->getCate();
                $sups = $this->productModel->getSup();
                include 'View/product/add.php';
            }
        }
    }

    public function update()
    {
        $id = $_REQUEST['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $product = $this->productModel->get($id);
            $cates = $this->productModel->getCate();
            $sups = $this->productModel->getSup();
            include 'View/product/update.php';
        } else {
            $error = $this->error();
            if (empty($error)) {
                $_REQUEST['img'] = $this->img();
//                    $product = new Product($_POST);
//                    echo '<pre>';
//                    var_dump($this->productModel->update($_REQUEST));
//                    die();
                //echo '<pre>';var_dump($_REQUEST);die();
                $this->productModel->update($_REQUEST);
                header("location: index.php?page=product&action=list");
            } else {
                $sups = $this->productModel->getSup();
                $cates = $this->productModel->getCate();
                $product = $this->productModel->get($id);
                include 'View/product/update.php';
            }
        }
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->productModel->delete($id);
        header("Location: index.php?page=product&action=list");
    }

    public function search()
    {
        $search = $_POST['search'];
        $products = $this->productModel->search($search);
        if (empty($products)) {
            echo "<h3 style='text-align: center'>Not Found Product</h3>";
            die();
        } elseif ($_REQUEST['page'] == 'product') {
            include 'View/product/list.php';
        } else {
            include 'View/sale/list.php';
        }
    }

    public function category()
    {
        $category = $_REQUEST['category'];
        $products = $this->productModel->getProByCate($category);
        if ($_REQUEST['page'] == 'sale') {
            include 'View/sale/list.php';
        } else {
            include 'View/product/list.php';
        }
    }

    public function detail()
    {
        $id = $_REQUEST['id'];
        $product = $this->productModel->get($id);
        include 'View/sale/details.php';
    }

    public function sort()
    {
        $sort = $_REQUEST['sort'];
        $products = $this->productModel->sort($sort);
        if ($_REQUEST['page'] == 'sale') {
            include 'View/sale/list.php';
        } else {
            include 'View/product/list.php';
        }
    }
}
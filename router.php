<?php

namespace App\Controller\ProductController;

use App\Controller\CartController;
use App\Controller\ProductController;
use App\Controller\LoginController;

include __DIR__ . '/vendor/autoload.php';

$productController = new ProductController();
$cartController = new CartController();
$loginController = new LoginController();

$page = $_REQUEST['page'] ?? null;
$action = $_REQUEST['action'] ?? null;
switch ($page) {
    case 'product':
        switch ($action) {
            case 'list':
                $productController->show();
                break;
            case 'add':
                $productController->add();
                break;
            case 'update':
                $productController->update();
                break;
            case 'delete':
                $productController->delete();
                break;
            case 'search':
                $productController->search();
                break;
            case 'category':
                $productController->category();
                break;
            case 'sort':
                $productController->sort();
                break;
        }
        break;
    case 'sale':
        switch ($action) {
            case 'sale-list':
                $productController->sale();
                break;
            case 'detail':
                $productController->detail();
                break;
            case 'category':
                $productController->category();
                break;
            case 'sort':
                $productController->sort();
                break;
        }
        break;
    case 'cart':
        switch ($action) {
            case 'list':
                $cartController->index();
                break;
            case 'add':
                $cartController->add();
                break;
            case 'update':
                $cartController->update();
                break;
            case 'delete':
                $cartController->delete();
                break;
        }
        break;
    case 'user':
        switch ($action) {
            case 'logout':
                $loginController->logout();
                break;
            case 'login':
                $loginController->goLogin();
                break;
            case 'register':
//                var_dump('1');die();
                $loginController->goRegister();
                break;
        }
        break;
    default:
        $productController->sale();
}
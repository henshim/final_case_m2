<?php

namespace App\Controller;

use App\Model\LoginModel;

class LoginController
{
    public $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function getLogin(): bool
    {
        $user = $this->loginModel->login($_REQUEST);

        if ($user) {
            session_start();
            $_SESSION['userLogin'] = $user[0];
            if ($_REQUEST['page'] == 'cart') {
                header('Location: ../../index.php?page=cart&action=list');
            } else {
                header('Location: ../../index.php');
            }
        }
        return false;
    }

    public function login()
    {
        $user = $this->loginModel->login($_REQUEST);
        if ($user) {
            session_start();
            $_SESSION['userLogin'] = $user[0];
            header('Location: ../../index.php?page=cart&action=list');
        } else {
            header('Location: ../../index.php?page=user&action=login');
        }
    }

    public function goLogin()
    {
        header('Location: View/login/login.php');
    }

    public function get()
    {
        $id = $_SESSION['id'];
        $users = $this->loginModel->get($id);
        $data = $users;
    }

    public function logout()
    {
        //unset($_SESSION['id']);
        //var_dump($_SESSION['userLogin']);die();
        //var_dump(session_destroy());die();\
        session_start();
        session_unset();
        session_destroy();
        header('Location:index.php?page=sale&action=sale-list');
    }

    public function img()
    {
        $targetDir = 'img/';
        $targetName = basename($_FILES['img']['name']);
        $targetFile = $targetDir . $targetName;
        move_uploaded_file($_FILES['img']['tmp_name'], $targetFile);
        return $targetName;
    }

    public function validate($request)
    {
        $pattern = "/^[A-Za-z0-9]{6}[^@#!%^&*()]/";
        if (preg_match($pattern, $request)) {
            return true;
        }
        return false;
    }

    public function goRegister()
    {
        header('Location: View/login/register.php');
    }

    public function register()
    {
//        var_dump('123');die();

        //$_REQUEST['img'] = $this->img();
        //var_dump($this->loginModel->add($_REQUEST));die();
        $this->loginModel->add($_REQUEST);
        header('Location: ../../index.php?page=user&action=login');
    }
}
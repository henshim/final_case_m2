<?php

namespace App\Mid;

class Login
{
    public function isLogin()
    {
        if (!isset($_SESSION['userLogin'])){
            header('Location: View/login/login.php');
        }
    }
}
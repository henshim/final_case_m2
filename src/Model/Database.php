<?php 
namespace App\Model;
use PDO;
use PDOException;

class Database{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct(){
        $this->dsn ="mysql:host=localhost;dbname=finalCase";
        $this->username ='admin';
        $this->password ='123456';
    }

    public function connect(){
        try {
            return new PDO($this->dsn, $this->username, $this->password);
        }catch (PDOException $exception){
            echo $exception->getMessage();
            die();
        }
    }
}
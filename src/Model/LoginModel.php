<?php


namespace App\Model;


use PDO;

class LoginModel
{
    public $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function get($id){
        $sql = "SELECT * FROM users where id = $id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function login($request)
    {
        $sql = "SELECT * FROM users WHERE name = ? and password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$request['name']);
        $stmt->bindParam(2,$request['password']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function add($request)
    {
        $sql = "INSERT INTO users(name,password) VALUE(?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$request['name']);
        $stmt->bindParam(2,$request['password']);
        //$stmt->bindParam(3,$request['img']);
        return $stmt->execute();
    }
}
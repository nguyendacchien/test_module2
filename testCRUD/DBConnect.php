<?php


class DBConnect
{
    private $dsn;
    private $username;
    private $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=testCRUD;charset=utf8";
        $this->username = "root";
        $this->password = "@Chien2222";
    }

    public function Connect()
    {
        try {
            $conn = new PDO($this->dsn,$this->username,$this->password);
            return $conn;
        }catch (PDOException $exception){
            echo $exception->getMessage();
            die();
        }
    }
}
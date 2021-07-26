<?php



class DBStudent
{
    public  $dsn;
    public $username;
    public $password;

    public function __construct()
    {
        $this->dsn= "mysql:host=localhost;dbname=studentTest;charset=utf8";
        $this->username = "root";
        $this->password ="@Chien2222";
    }
    public function connect(){
        try {
            $conn = new PDO($this->dsn,$this->username,$this->password);
            return $conn;
        }catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
}
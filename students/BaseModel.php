<?php

include_once "DBStudent.php";

class BaseModel
{
    public $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBStudent();
    }

    public function getAllStudent()
    {
        $sql = "select * from studentTests";
        $stmt = $this->dbConnect->connect()->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $arr = $stmt->fetchAll();
        return $arr;
    }
}
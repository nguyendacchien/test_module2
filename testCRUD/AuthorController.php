<?php

include_once "DBConnect.php";
include_once "Author.php";
class AuthorController
{
    private $dbConnect;
    private $table;

    public function __construct()
    {
        $this->table = "authors";
        $this->dbConnect= new  DBConnect();
    }

    //CRUD
    public function create($author)
    {
        $sql = "INSERT INTO authors (`first_name`, `last_name`, `email`, `birthdate`) VALUES (:fn, :ln, :email, :dob)";
        $stmt = $this->dbConnect->connect()->prepare($sql);
        $stmt->bindParam(':fn', $author->getFirstName());
        $stmt->bindParam(':ln', $author->getLastName());
        $stmt->bindParam(':email', $author->getEmail());
        $stmt->bindParam(':dob', $author->getBirthdate());
        $stmt->execute();

    }

    public function getAll()
    {
        $sql = "SELECT * FROM  $this->table";
        $stmt = $this->dbConnect->Connect()->query($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $this->convertToObject($data);
    }

    public function convertToObject($data)
    {
        $authors = [];
        foreach ($data as $item){
            $author = new Author($item->first_name, $item->last_name, $item->email, $item->birthdate);
            $author->setId($item->id);
            array_push($authors, $author);
        }
        return $authors;
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `authors` WHERE id =".$id;
        $stmt = $this->dbConnect->connect()->query($sql);
        $stmt->execute();
    }

    public function callDelete($id)
    {
        $id=$_REQUEST['id'];
        $author = $this->Delete($id);

        header('location: index.php');
    }

//    public function edit($id, $fn , $ln , $email , $dob)
//    {
//        $id = $_REQUEST['id'];
//        $sql = "UPDATE $this->table SET first_name = $fn, last_name= $ln, email= $email, birthdate = $dob WHERE id = $id";
//        $stmt = $this->dbConnect->connect()->query($sql);
//        $stmt->execute();
//    }

    public function updateAuthor($id, $author)
    {
        $sql = "UPDATE $this->table SET `first_name`=:fn, `last_name`=:ln, `email`=:email, `birthdate`=:dob 
        where `id`=". $id;
        $stmt = $this->dbConnect->connect()->prepare($sql);
        $stmt->bindParam(":fn", $author->getFirstName());
        $stmt->bindParam(":ln", $author->getLastName());
        $stmt->bindParam(":email", $author->getEmail());
        $stmt->bindParam(":dob", $author->getBirthdate());
        $stmt->execute();
    }

    public function getById($id)
    {
        $authors = $this->getAll();
        foreach ($authors as $author){
            if ($author->getID()==$id){
                return $author;
            }
        }
    }

    public function showAllAuthor()
    {
        $authors = $this->getAll();
        include_once "Views/list.php";

    }

}
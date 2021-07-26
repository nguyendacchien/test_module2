<?php
include_once "DBConnect.php";
include_once "AuthorController.php";
$authorController = new  AuthorController();
$authorController->showAllAuthor();

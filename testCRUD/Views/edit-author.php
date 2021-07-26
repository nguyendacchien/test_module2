<?php
include_once 'layout/header.php';
include_once "../Author.php";
include_once "../AuthorController.php";
$authors = new AuthorController();
if (isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $author = $authors->getById($id);
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_REQUEST['id'];
    $firstname = $_REQUEST['first-name'];
    $lastname = $_REQUEST['last-name'];
    $email = $_REQUEST['email'];
    $birthdate = $_REQUEST['birthdate'];
    $author = new Author($firstname, $lastname, $email, $birthdate);
    $authors->updateAuthor($id, $author);
    header('location: ../index.php');

}
?>
<div class="container">
    <h3 class="mt-1 mb-2">Edit Author</h3>
    <hr>
    <form class="row g-3" method="post">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">First Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="first-name"
            value="<?php echo $author->getFirstName()?>">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="inputPassword4" name="last-name"
                   value="<?php echo $author->getLastName()?>">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputAddress" placeholder="abc@gmail.com" name="email"
                   value="<?php echo $author->getEmail()?>">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="inputAddress2" name="birthdate"
                   value="<?php echo $author->getBirthdate()?>">
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary mt-2">
        </div>
    </form>
</div>
<?php

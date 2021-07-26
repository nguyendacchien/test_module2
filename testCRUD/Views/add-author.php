
<?php
include_once 'layout/header.php'
?>
<div class="container">
    <h3 class="mt-1 mb-2">Add Author</h3>
    <hr>
    <form class="row g-3" method="post">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">First Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="first-name">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="inputPassword4" name="last-name">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputAddress" placeholder="abc@gmail.com" name="email">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="inputAddress2" name="birthdate">
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary mt-2">
        </div>
    </form>
</div>
<?php
include_once "../Author.php";
include_once "../AuthorController.php";
$ac = new AuthorController();
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $author = new Author($firstName, $lastName, $email, $birthdate);
    $ac->create($author);
    header('location: ../index.php');
}
include_once "layout/footer.php";

?>
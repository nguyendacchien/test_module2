<?php
include_once "layout/header.php";
include_once "../Author.php";

$author = new AuthorController();
if (isset($_REQUEST['page'])){
    if ($_REQUEST['page']=='delete'){
        $id = $_REQUEST['page'];
        $author->callDelete($id);
    }
}
?>
<div class="container">
    <a href="Views/add-author.php" class="btn btn-lg btn-success mb-3 mt-3">Add Author</a>
    <table class="table  table-striped table-hover block-center" border="1px" style="text-align:center">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">BirthDate</th>
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($authors)) {
            foreach ($authors as $author) :?>
                <tr>
                    <th scope="row"><?php echo $author->getID() ?></th>
                    <td><?php echo $author->getFirstName() ?></td>
                    <td><?php echo $author->getLastName() ?></td>
                    <td><?php echo $author->getEmail() ?></td>
                    <td><?php echo $author->getBirthdate() ?></td>
                    <td><a href="index.php?page=delete&id=<?php echo $author->getID() ?>" onclick="return confirm('bạn chắc chắn muốn xóa?')">Delete</a></td>
                    <td><a href="Views/edit-author.php?id=<?php echo $author->getID() ?>">Edit</a></td>

                </tr>
            <?php endforeach;
        } else { ?>
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php
include_once "layout/footer.php";
?>

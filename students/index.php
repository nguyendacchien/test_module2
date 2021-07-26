<?php
include_once "BaseModel.php";
$base = new BaseModel();
$results = $base->getAllStudent();
?>
<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>

<!--<a href="add.php">-->
<!--    <button style="background-color: green; color: white">ADD Product</button>-->
<!--</a>-->
<!--<span><a href="#" class="btn btn-light" id="navbarDropdown" role="button" data-toggle="dropdown"-->
<!--         aria-haspopup="true" aria-expanded="false">-->
<!--        Sắp xếp ↕-->
<!--    </a>-->
<!--    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--        <a class="dropdown-item" href="index.php?sort=up"><button class="dropdown-item">Tăng theo giá ↑</button></a>-->
<!--        <a class="dropdown-item" href="index.php?sort=down"><button class="dropdown-item">Giảm theo giá ↓</button></a>-->
<!--    </div>-->
<!--        </span>-->
<!--<a href="index.php?sort=up">Tăng theo giá ↑-->
<!--</a>-->
<!--<a href="index.php?sort=down">Giảm theo giá ↓-->
<!--</a>-->

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">RN</th>
        <th scope="col">test_id</th>
        <th scope="col">Date</th>
        <th scope="col">Mark</th>
<!--        <th scope="col">Image</th>-->
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $key => $result): ?>
        <tr>
            <td><?php echo $result->students_name; ?></td>
            <td><?php echo $result->tests_name ?></td>
            <td><?php echo $result->Date ?></td>
            <td><?php echo $result->Mark ?></td>
<!--            <td>--><?php //echo $product->getImage() ?><!--</td>-->
            <td>
<!--                <a href="edit.php?id=--><?php //echo $result->RN ?><!--">-->
                    <button style="background-color: yellow; color: black">Edit</button>
                </a>
            </td>
            <td>
                <a href="index.php?page=delete&id=<?php echo $result->RN ?>">
                    <button style="background-color: red; color: white">Delete</button>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>


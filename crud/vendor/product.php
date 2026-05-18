<?php
    require_once 'config/connect.php';
    $product_id = $_GET['id'];
    $product = mysqli_query($connect, query: "SELECT * FROM `products` WHERE `id` = '$product_id'");
    $product = mysqli_fetch_assoc($product);
    $comments = mysqli_query($connect, query: "SELECT * FROM `comments` WHERE `product_id` = '$product_id'");
    $comments = mysqli_fetch_all($comments);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Product</title>
</head>
<body>
    <h2>title: <?= $product['title'] ?></h2>
    <h2>price: <?= $product['price'] ?></h2>
    <p>description: <?= $product['description'] ?></p>

    <hr>
    <h3>Add comment</h3>
    <form action="vendor/create_comment.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <textarea name="body"></textarea> <br><br>
        <button type="submit">Add comment</button>
    </form>
    <hr>
    <h3>Comments</h3>
    <ul>
        <?php
            foreach ($comments as $comment) {
            ?>
                <li><?= $comment[2] ?></li>
            <?php
            }
        ?>
    </ul>
</body>
</html>
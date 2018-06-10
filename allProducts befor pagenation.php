<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/3/2018
 * Time: 2:53 PM
 */
include_once "header.php";
include_once "controller.php";
if(isset($_SESSION['user'])) {


    $allProduct = getAllProductByCategoryId($_GET["id"]);
    $catName = $_GET["catName"];
    ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="title">All Products in <?php echo $catName ?> </div>
<div class="container">
    <?php
    if ($allProduct != null) {
        foreach ($allProduct as $prod) {
            ?>
            <a href="product.php?id=<?php echo $prod->id ?>" class="card">
                <div class="imgDiv"><img class="image" src="<?php echo $prod->images ?>"></div>
                <div class="info">
                    <div class="name"><?php echo $prod->name ?></div>
                    <div class="price"><?php echo $prod->price ?>$</div>
                </div>
                <div class="clearFix"></div>
            </a>

        <?php
        }
    }
    ?>
</div>
</body>
</html>
<link rel="stylesheet" href="style/allProducts.css">
<?php

}
else redirect("signIn.php");
?>
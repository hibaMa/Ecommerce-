<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/4/2018
 * Time: 3:02 PM
 */
//shopingCard

include_once "header.php";
include_once "controller.php";
if(isset($_SESSION['user'])) {
    $allProduct = getProductFromCart($_SESSION['user']);

    ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="title">All Products in shopping Card </div>
<div class="container">
    <?php
    if ($allProduct != null) {
        foreach ($allProduct as $prod) {
            ?>
            <div class="card" >
            <a href="product.php?id=<?php echo $prod->id ?>" >
                <div class="imgDiv">
                    <img class="image" src="<?php echo $prod->images ?>">
                </div>
                <div class="info">
                    <div class="name"><?php echo $prod->name ?></div>
                    <div class="price"><?php echo $prod->price ?>$</div>
                </div>
                <div class="clearFix"></div>
            </a>
            <div style="height: 20%"><a class="btn btn-primary" href="controller.php?action=deleteFromCard&id=<?php echo $prod->rowID ?>">delete</a></div>
            </div>

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
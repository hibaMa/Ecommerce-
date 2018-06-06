<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/3/2018
 * Time: 3:42 PM
 */
include_once "header.php";
include_once "controller.php";
if(isset($_SESSION['user'])) {

$Product=getProductById($_GET["id"]);

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container">
    <div class="floatLeft imgDiv"><img class="image" src="<?php echo $Product->images ?>" alt=""/></div>
    <div class="floatLeft desDiv">
        <div class="name padTop10"><?php echo $Product->name ?></div>
        <div class="price padTop10"><?php echo $Product->price ?>$</div>
        <div class="description padTop10">
            <?php echo $Product->description ?>
        </div>
        <div><a href="controller.php?action=addProductToCard&id=<?php echo $Product->id ?>&userID=<?php echo $_SESSION['user'] ?>" class="btn btn-primary">add to the card</a></div>
    </div>
    <div class="clearfix"></div>
</div>
</body>
</html>
<link href="style/product.css" rel="stylesheet">
<?php

}
else redirect("signIn.php");
?>
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
<input type="hidden" id="catId" value="<?php echo $_GET["id"] ?>"/>
<div class="title">All Products in <?php echo $catName ?> </div>
<div>
    <div class="selectDiv" id="sortBy">
        <label>sort by :</label>
        <select class="select">
            <option value="name">name</option>
            <option value="price">price</option>
        </select>
    </div>
    <div class="clearFix"></div>
</div>
<hr/>
<div class="container">

    <div id="data-container"></div>
    <div class="clearFix"></div>
    <div id="pagination-container"></div>

</div>
</body>
</html>
<?php

}
else redirect("signIn.php");
?>

<script src="product_pagenation.js"></script>
<script src="paginationjs/dist/pagination.min.js"></script>
<link rel="stylesheet" href="paginationjs/dist/pagination.css"/>
<link rel="stylesheet" href="style/allProducts.css">


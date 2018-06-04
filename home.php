<?php
include_once "header.php";
include_once "controller.php";
if(isset($_SESSION['user'])) {

$allCategory=getAllCategory();
?>
<a href="controller.php?action=signOut">signOut</a>
  <div> <a href="shoppingCard.php">shopping Card</a></div>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="adminButton"><a href="adminPages/adminPage.php">admin</a></div>
<div class="title">All Category</div>
<div class="container">
    <?php
    foreach($allCategory as $cat) {
    ?>
    <a href="allProducts.php?id=<?php echo $cat->id ?>&catName=<?php echo $cat->name ?>" class="card">

          <div class="name"><?php echo $cat->name ?></div>
          <div class="description des">
              <?php echo $cat->description ?>
          </div>

  </a>
    <?php
    }
    ?>
</div>
</body>
</html>
<link rel="stylesheet" href="style/home.css">
<?php

}
else redirect("signIn.php");
?>
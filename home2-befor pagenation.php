<?php
include_once "header.php";
include_once "controller.php";
if(isset($_SESSION['user'])) {
$allCategory=getAllCategory();
?>

<body>


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
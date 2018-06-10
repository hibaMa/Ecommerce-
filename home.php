
<?php
include_once "header.php";
include_once "controller.php";
?>
<script src="home-pagenation.js"></script>
<script src="paginationjs/dist/pagination.min.js"></script>
<link rel="stylesheet" href="paginationjs/dist/pagination.css"/>
<?php
if(isset($_SESSION['user'])) {
    $allCategory=getAllCategory();

    ?>

<body>

<div class="title">All Category</div>
<div class="container">
<div id="data-container"></div>
<div class="clearFix"></div>
<div id="pagination-container"></div>

</div>
</body>
</html>
<link rel="stylesheet" href="style/home.css">


<?php

}
else redirect("signIn.php");
?>

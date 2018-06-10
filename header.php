
<?php
include_once "controller.php";
$user = new stdClass();
if (isset($_SESSION['user'])) {
    $user = get_user_by_id($_SESSION['user']);
}
else{
    $user->id=-1;
}


?>
<html lang="en">
<head>
    <title>simple Ecommerce web </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="controller.php?action=signOut">signOut</a></li>
            <li><a href="shoppingCard.php">shopping Card</a></li>
            <?php if($user->id!=-1 and $user->admin==1) {  ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">admin  Pages<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="addCategory.php">Add Category</a></li>
                        <li><a href="addProducts.php">Add Product</a></li>
                        <li><a href="AllCategoryTable.php">All Category</a></li>
                        <li><a href="AllProductsTable.php">All Product</a></li>
                    </ul>
                </li>
            <?php }?>
        </ul>
    </div>
</nav>


<?php

if(isset($_GET['goodSMS'])){
    echo "<div class='goodSMS SMS'>". "Done!".$_GET['goodSMS']."<br><br></div>";
}
if(isset($_GET['error'])){
    echo "<div class='errorSMS SMS'>"."Error!".$_GET['error']."<br><br></div>";
}
?>

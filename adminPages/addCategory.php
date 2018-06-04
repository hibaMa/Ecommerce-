<?php
include_once "../header.php";
include_once "../controller.php";
if(isset($_SESSION['user'])) {
    ?>
<a href="../controller.php?action=signOut">signOut</a>
<a href="../home.php">home</a>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container">
    <h2>Add New Category</h2>

    <form action="../controller.php?action=addCat" method="post">
        <div><label>name:</label><input type="text" id="name" name="name"></div>
        <div>
            <label class="floatLeft">description:</label>
            <textarea class="floatLeft" rows="6" cols="30" id="description" name="description"></textarea>
            <div class="clearfix"></div>
        </div>


        <div><button type="submit" class="button">add</button></div>
    </form>
</div>
</body>
</html>
<link rel="stylesheet" href="../style/add.css">

<?php
}else redirect("../signIn.php");
?>
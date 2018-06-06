<?php
include_once "controller.php";
include_once "header.php";
$cat=getCatById_db($_GET["id"]);
if(isset($_SESSION['user'])) {
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container">
    <h2>Add New Category</h2>

    <form action="controller.php?action=editCat&id=<?php echo $_GET["id"] ?>" method="post">
        <div><label>name:</label><input type="text" id="name" name="name" value="<?php echo $cat->name?>"></div>
        <div>
            <label class="floatLeft">description:</label>
            <textarea class="floatLeft" rows="6" cols="30" id="description" name="description">
                <?php echo $cat->description ?>
            </textarea>
            <div class="clearfix"></div>
        </div>


        <div><button type="submit" class="button">edit</button></div>
    </form>
</div>
</body>
</html>
<link rel="stylesheet" href="style/add.css">
<?php
}else redirect("signIn.php");
?>
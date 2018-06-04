<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/3/2018
 * Time: 1:19 PM
 */
//addProducts
include_once "../header.php";
include_once "../controller.php";
if(isset($_SESSION['user'])) {

$allCategory=getAllCategory();
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
    <h2>Add New Product</h2>

    <form action="../controller.php?action=addProduct" method="post" enctype="multipart/form-data">
        <div>
            <label>category</label>
            <select name="allCat" id="allCat">
                <?php
                if($allCategory!=null){
                    foreach($allCategory as $cat){
                    ?>
                    <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                <?php
                   }
                }
                ?>
            </select>
        </div>
        <div><label>name:</label><input type="text" id="name" name="name"></div>
        <div><label>price:</label><input type="number" id="price" name="price"></div>
        <div><label>image :</label><input type="file" name="productImg" id="img"></div>
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
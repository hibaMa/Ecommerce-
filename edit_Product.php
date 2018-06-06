<?php
include_once "header.php";
include_once "controller.php";
if(isset($_SESSION['user'])) {

$allCategory=getAllCategory();
$product=getProductById($_GET["id"]);
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container">
    <h2>Add New Product</h2>

    <form action="controller.php?action=editPro&id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data">
        <div>
            <label>category</label>
            <select name="allCat" id="allCat">
                <?php
                if($allCategory!=null){
                    foreach($allCategory as $cat){
                        ?>
                        <option <?php if($product->category==$cat->id)echo "selected" ?> value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                    <?php
                    }
                }
                ?>
            </select>
        </div>
        <div><label>name:</label><input type="text" id="name" name="name" value="<?php echo $product->name ?>"></div>
        <div><label>price:</label><input type="number" id="price" name="price" value="<?php echo $product->price ?>"></div>
        <div><label>image :</label><input type="file" name="productImg" id="img"></div>
        <div>
            <label class="floatLeft">description:</label>
            <textarea class="floatLeft" rows="6" cols="30" id="description" name="description">
                <?php echo $product->description ?>
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
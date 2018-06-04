
<?php
include_once "../controller.php";
if(isset($_SESSION['user'])) {
?>
<a href="../controller.php?action=signOut">signOut</a>
<a href="../home.php">home</a>
<ul>
    <li><a href="addCategory.php">Add Category</a></li>
    <li><a href="addProducts.php">Add Product</a></li>
    <li><a href="AllCategoryTable.php">All Category</a></li>
    <li><a href="AllProductsTable.php">All Product</a></li>
</ul>
<?php
}else redirect("../signIn.php");
?>
<?php
include_once "../header.php";
include_once "../controller.php";
if(isset($_SESSION['user'])) {
$allCategory=getAllCategory();
?>
<a href="../controller.php?action=signOut">signOut</a>
<a href="../home.php">home</a>
<div class="container">
    <div class=" ">
        <table class="table" border="">
            <tr>
                <th>name</th>
                <th>description</th>
                <th>delete</th>
                <th>edit</th>
            </tr>
            <?php
            foreach ($allCategory as $cat) { ?>

                <tr id="tr_<?php echo $cat->id; ?>">
                    <td><?php echo $cat->name; ?></td>
                    <td><?php echo $cat->description; ?></td>
                    <td><a  href="../controller.php?action=deleteCat&id=<?php echo $cat->id; ?>">delete</a></td>
                    <td><a href="edit_cat.php?id=<?php echo $cat->id; ?>">edit</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<link rel="stylesheet" href="../style/allTables.css">
<?php
}else redirect("../signIn.php");
?>
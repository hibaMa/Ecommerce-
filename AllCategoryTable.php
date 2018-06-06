<?php
include_once "header.php";
include_once "controller.php";
if($user->id!=-1 and $user->admin==1) {
    $allCategory=getAllCategory();
?>

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
                    <td><?php echo substr($cat->description, 0, 40)."..."; ?></td>
                    <td><a  href="controller.php?action=deleteCat&id=<?php echo $cat->id; ?>">delete</a></td>
                    <td><a href="edit_cat.php?id=<?php echo $cat->id; ?>">edit</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<link rel="stylesheet" href="style/allTables.css">
<?php
}else redirect("signIn.php");
?>
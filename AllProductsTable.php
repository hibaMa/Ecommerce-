<?php
include_once "header.php";
include_once "controller.php";
if($user->id!=-1 and $user->admin==1) {
    $allProduct=getAllProduct();

?>
    <style>
        tr,th{
            word-wrap: break-word;
        }
    </style>
<div class="container">
    <div class=" ">
        <table class="table table-bordered" border="">
            <tr>
                <th>name</th>
                <th>description</th>
                <th>images</th>
                <th>price</th>
                <th>category</th>
                <th>delete</th>
                <th>edit</th>
            </tr>
            <?php
            if($allProduct!=null) {
                foreach ($allProduct as $pro) { ?>
                    <tr id="tr_<?php echo $pro->id; ?>">
                        <td><?php echo $pro->name; ?></td>
                        <td><?php echo substr($pro->description, 0, 40)."..."; ?></td>
                        <td><img style="height: 100px;" src="<?php echo $pro->images; ?>" alt=""/></td>
                        <td><?php echo $pro->price; ?></td>
                        <td><?php $cat=getCatById($pro->category); echo $cat->name ?></td>
                        <td><a href="controller.php?action=deletePro&id=<?php echo$pro->id; ?>">delete</a></td>
                        <td><a href="edit_Product.php?id=<?php echo $pro->id; ?>">edit</a></td>
                    </tr>
                <?php }
            }?>
        </table>
    </div>
</div>
<link rel="stylesheet" href="style/allTables.css">
<?php
}else redirect("signIn.php");
?>
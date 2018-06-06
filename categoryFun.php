<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/3/2018
 * Time: 12:54 PM
 */
function addCategory(){
    if(isset($_POST["name"]) && isset($_POST["description"])){
        if($_POST["name"].trim(" ")!="" && $_POST["description"].trim(" ")!=""){

            $cat['name']=$_POST["name"];
            $cat['description']=$_POST["description"];

            $Error=addCategory_db($cat);
            if($Error){
                redirect("addCategory.php?error=".$Error);
            }else{
                redirect("addCategory.php?goodSMS=added Successfully ");
            }
        }else{
            redirect("addCategory.php?error=fill all spaces ");
        }
    }else{
        redirect("addCategory.php?error=set all spaces ");
    }
}
function editCat($id){
    if(isset($_POST["name"]) && isset($_POST["description"])){
        if($_POST["name"].trim(" ")!="" && $_POST["description"].trim(" ")!=""){


            $cat['name']=$_POST["name"];
            $cat['description']=$_POST["description"];
            $cat['id']=$id;

            $Error=editCat_db($cat);
            if($Error){
                redirect("AllCategoryTable.php?error=".$Error);
            }else{
                redirect("AllCategoryTable.php?goodSMS=edited Successfully ");
            }
        }else{
            redirect("AllCategoryTable.php?error=fill all spaces ");
        }
    }else{
        redirect("AllCategoryTable.php?error=set all spaces ");
    }

}
function getAllCategory(){
    return getAllCategory_db();
}
function deleteCat($id){
    if(deleteCat_db($id)){
       if(deleteProductInCat($id)){
           redirect("AllCategoryTable.php ");
       }else{
           redirect("AllCategoryTable.php?error=system error in delete product in cat  ");
       }
    }else{
        redirect("AllCategoryTable.php?error=system error in delete cat  ");

    }
}
function getCatById($id){
    return getCatById_db($id);
}

?>
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
                redirect("adminPages/addCategory.php?error=".$Error);
            }else{
                redirect("adminPages/addCategory.php?goodSMS=added Successfully ");
            }
        }else{
            redirect("adminPages/addCategory.php?error=fill all spaces ");
        }
    }else{
        redirect("adminPages/addCategory.php?error=set all spaces ");
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
                redirect("adminPages/AllCategoryTable.php?error=".$Error);
            }else{
                redirect("adminPages/AllCategoryTable.php?goodSMS=edited Successfully ");
            }
        }else{
            redirect("adminPages/AllCategoryTable.php?error=fill all spaces ");
        }
    }else{
        redirect("adminPages/AllCategoryTable.php?error=set all spaces ");
    }

}
function getAllCategory(){
    return getAllCategory_db();
}
function deleteCat($id){
    if(deleteCat_db($id)){
       if(deleteProductInCat($id)){
           redirect("adminPages/AllCategoryTable.php ");
       }else{
           redirect("adminPages/AllCategoryTable.php?error=system error in delete product in cat  ");
       }
    }else{
        redirect("adminPages/AllCategoryTable.php?error=system error in delete cat  ");

    }
}
function getCatById($id){
    return getCatById_db($id);
}

?>
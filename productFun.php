<?php
/**
 * Created by PhpStorm.
 * User: user
* Date: 6/3/2018
* Time: 1:30 PM
*/
function  addProduct(){
    if(isset($_POST["name"]) && isset($_POST["description"])&& isset($_POST["price"])&& isset($_POST["allCat"])){
        if($_POST["name"].trim(" ")!="" && $_POST["description"].trim(" ")!="" && $_POST["price"].trim(" ")!="" ){

            $product['productImg']=uploadProductImage("addProducts.php");
            $product['name']=$_POST["name"];
            $product['description']=$_POST["description"];
            $product['price']=$_POST["price"];
            $product['cat']=$_POST["allCat"];

            $Error=addProduct_db($product);
            if($Error){
                redirect("addProducts.php?error=system Error ".$Error);
            }else{
                redirect("addProducts.php?goodSMS=added Successfully ");
            }

        }else{
            redirect("addProducts.php?error=fill all spaces product");
        }
    }else{
        redirect("addProducts.php?error=set all spaces ");
    }
}

function  editPro($id){
    if(isset($_POST["name"]) && isset($_POST["description"])&& isset($_POST["price"])&& isset($_POST["allCat"])){
        if($_POST["name"].trim(" ")!="" && $_POST["description"].trim(" ")!="" && $_POST["price"].trim(" ")!="" ){

            $product['name']=$_POST["name"];
            $product['description']=$_POST["description"];
            $product['price']=$_POST["price"];
            $product['category']=$_POST["allCat"];
            $product['id']=$id;

            if($_FILES['productImg']['name']!=""){
                $product['img']=uploadProductImage("AllProductsTable.php");
                $Error=editPro_db($product);
            }
            else{
                $Error=editPro_db_noImg($product);
            }
            if($Error){
                redirect("AllProductsTable.php?error=system Error ".$Error);
            }else{
                redirect("AllProductsTable.php?goodSMS=added Successfully ");
            }

        }else{
            redirect("AllProductsTable.php?error=fill all spaces product");
        }
    }else{
        redirect("AllProductsTable.php?error=set all spaces ");
    }
}

function uploadProductImage($page){
    if($_FILES['productImg']['name']!=""){
        $error=$_FILES['productImg']['error'];
        if($error) redirect($page."?error=File error" .  $error);
        if($_FILES['productImg']["size"]==0){
            redirect($page."?error=" ."fill all spaces Img");
        }else{
            $productImg=$_FILES['productImg'];
            $temp=$productImg['tmp_name'];
            $type=strtolower(end(explode('.',$productImg['name'])));
            $new_filename = uniqid('', true) . '.' . $type;
            $fileToUpload="ProductImages/" . $new_filename;;
            if($productImg['size']>500000){
                redirect($page."?error=" ."large file");
            }
            $allowed = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($type, $allowed)) {
                if(move_uploaded_file($temp,$fileToUpload)){
                    return $fileToUpload;
                }else{
                    redirect($page."?error=" .  "failed to upload ");
                }
            }else  redirect($page."?error=" . "wrong file type!");
        }
    }else{
        redirect($page."?error=" . "setImageError");
    }
}


function getAllProductByCategoryId($id){
    return getAllProductByCategoryId_db($id);
}

function getProductById($id){
    return getProductById_db($id);
}

function deleteProductInCat($id){
    return deleteProductInCat_db($id);
}

function getAllProduct(){
    return getAllProduct_db();
}

function deletePro($id){
    if(deletePro_db($id)){
            redirect("AllProductsTable.php ");
    }else{
        redirect("AllProductsTable.php?error=system error in delete cat  ");

    }
}

function addProductToCard($proID,$userID){
    if(!addProductToCard_db($proID,$userID)){
        redirect("home.php?goodSMS=added Successfully ");
    }else{
        redirect("home.php?error=system error in add to card  ");
    }
}


function getProductFromCart($id){
    return getProductFromCart_db($id);
}


function  deleteFromCard($id){
    if(deleteFromCard_db($id)){
        redirect("shoppingCard.php ");
    }else{
        redirect("shoppingCard.php?error=system error in delete cat  ");

    }
}


?>
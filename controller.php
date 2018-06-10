<?php
require_once('swiftmailer-5.x/lib/swift_required.php');
include_once "model.php";
include_once "userFun.php";
include_once "categoryFun.php";
include_once "productFun.php";
if(isset($_GET['action'])){
    $action=$_GET['action'];
    switch($action) {
        case "signIn":
            signIn();
            break;
        case "register":
             regester();
            break;
        case "signOut":
            signOut();
            break;
        case "addCat":
            addCategory();
            break;
        case "addProduct":
            addProduct();
            break;
        case "deleteCat":
            deleteCat($_GET['id']);
            break;
        case "editCat":
            editCat($_GET['id']);
            break;
        case "deletePro":
            deletePro($_GET['id']);
            break;
        case "editPro":
            editPro($_GET['id']);
            break;
        case "addProductToCard":
            addProductToCard($_GET['id'],$_GET['userID']);
            break;
        case "deleteFromCard":
            deleteFromCard($_GET['id']);
            break;
        case "getAllCategory":
            $allCategory=getAllCategory();
            echo json_encode($allCategory);
            break;
        case "getAllProducts":
            $allProduct=getAllProductByCategoryId($_GET["id"]);
            echo json_encode($allProduct);
            break;

    }
}

function redirect($url){
    header('Location: '.$url, true,'302');
    exit();
}
//case "update":
//            update();
//            break;
?>
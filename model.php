<?php

function connect_db()
{
    $server = "localhost";
    $dbuser = "root";
    $dbpass = "123456";
    $dbname = "shop";

    $conn = new mysqli($server, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        return false;
    } else {
        return $conn;
    }

}

function regester_db($userInfo){

    $conn = connect_db();
    $prepare = $conn->prepare('INSERT INTO `user_tbl`(`id`, `Fname`, `email`, `pass`, `Lname`, `city`) VALUES (null,?,?,?,?,?)');
    $prepare->bind_param('sssss',$userInfo['fname'],$userInfo["email"], $userInfo["pass"],$userInfo['lname'], $userInfo["city"]);
    $prepare->execute();
    if (!$prepare->errno) {
        return false;
    } else return $prepare->errno;

}

function UserExist_db($email){
    $conn = connect_db();
    $prepare = $conn->prepare('SELECT * FROM `user_tbl` WHERE `email`=?');
    $prepare->bind_param('s',$email);
    $prepare->execute();
    if (!$prepare->errno) {
        $result=$prepare->get_result();
        return $result->num_rows;
    } else return "error";
}

function signIn_db($userInfo){
    $conn = connect_db();
    $prepare = $conn->prepare('SELECT * FROM `user_tbl` WHERE `email`=? AND `pass`=?');
    $prepare->bind_param('ss',$userInfo["email"], $userInfo["pass"]);
    $prepare->execute();
    if (!$prepare->errno) {
        $result = $prepare->get_result();
        if($result->num_rows)
        return $result->fetch_object();
        else return 0;
    } else return false;
}

function addCategory_db($cat){
    $conn = connect_db();
    $prepare = $conn->prepare('INSERT INTO `categories`(`id`, `name`, `description`) VALUES (null,?,?)');
    $prepare->bind_param('ss',$cat['name'],$cat["description"]);
    $prepare->execute();
    if (!$prepare->errno) {
        return false;
    } else return $prepare->errno;

}

function  addProduct_db($product){
    $conn = connect_db();
    $prepare = $conn->prepare('INSERT INTO `products`(`id`, `name`, `description`, `images`, `price`, `category`) VALUES (null,?,?,?,?,?)');
    $prepare->bind_param('ssssd',$product['name'],$product['description'],$product['productImg'],$product['price'],intval($product['cat']));
    $prepare->execute();
    if (!$prepare->errno) {
        return false;
    } else return $prepare->errno;

}

function getAllCategory_db(){
    $con = connect_db();
    $prepare = $con->prepare('SELECT * FROM `categories` WHERE 1 limit 100');
    $prepare->execute();
    $result = $prepare->get_result();
    $array = [];
    while ($row = $result->fetch_object()) {
        $array[] = $row;
    }
    return $array;
}

function getAllProductByCategoryId_db($id){
    $con = connect_db();
    $prepare = $con->prepare('SELECT * FROM `products` WHERE `category`=?');
    $prepare->bind_param("d",$id);
    $prepare->execute();
    $result = $prepare->get_result();
    $array = [];
    while ($row = $result->fetch_object()) {
        $array[] = $row;
    }
    return $array;
}

function getProductById_db($id){
    $con = connect_db();
    $prepare = $con->prepare('SELECT * FROM `products` WHERE `id`=?');
    $prepare->bind_param("d",$id);
    $prepare->execute();
    $result = $prepare->get_result();
    return $result->fetch_object();
}

function deleteCat_db($id){
    $con = connect_db();
    $prepare = $con->prepare('DELETE FROM `categories` WHERE id=?');
    $prepare->bind_param('d', $id);
    $prepare->execute();
    if ($prepare->execute()) {
        return true;

    } else {
        return false;
    }
}

function deletePro_db($id){
    $con = connect_db();
    $prepare = $con->prepare('DELETE FROM `products` WHERE id=?');
    $prepare->bind_param('d', $id);
    if ($prepare->execute()) {

        $con = connect_db();
        $prepare = $con->prepare('DELETE FROM `user_product` WHERE `proID`=? ');
        $prepare->bind_param('d', $id);
        if ($prepare->execute()) {
            return true;
        }else return false;


    } else {
        return false;
    }
}

function deleteProductInCat_db($id){
    $con = connect_db();
    $prepare = $con->prepare('DELETE FROM `products` WHERE `category`=?');
    $prepare->bind_param('d', $id);
    $prepare->execute();
    if ($prepare->execute()) {
        return true;

    } else {
        return false;
    }
}

function editCat_db($cat){
    $conn = connect_db();
    $prepare = $conn->prepare('UPDATE `categories` SET `name`=?, `description`=? WHERE `id`=?');
    $prepare->bind_param('ssd',$cat['name'],$cat['description'], $cat['id']);
    $prepare->execute();
    if (!$prepare->errno) {
        return false;
    } else return "error".$prepare->errno;

}

function editPro_db($pro){
    $conn = connect_db();
    $prepare = $conn->prepare('UPDATE `products` SET `name`=?, `description`=?, `price`=?,`category`=? , `images`=? WHERE `id`=?');
    $prepare->bind_param("ssddsd",$pro['name'],$pro['description'],$pro["price"],$pro['category'],$pro['img'],$pro['id']);
    $prepare->execute();
    if (!$prepare->errno) {
        return false;
    } else return "error".$prepare->errno;

}

function editPro_db_noImg($pro){
    $conn = connect_db();
    $prepare = $conn->prepare('UPDATE `products` SET `name`=?, `description`=?, `price`=?,`category`=? WHERE `id`=?');
    $prepare->bind_param("ssddd",$pro['name'],$pro['description'],$pro["price"],$pro['category'],$pro['id']);
    $prepare->execute();
    if (!$prepare->errno) {
        return false;
    } else return "error".$prepare->errno;

}

function getCatById_db($id){
    $con = connect_db();
    $prepare = $con->prepare('SELECT * FROM `categories` WHERE `id`=?');
    $prepare->bind_param("d",$id);
    $prepare->execute();
    $result = $prepare->get_result();
    return $result->fetch_object();
}

function getAllProduct_db(){
    $con = connect_db();
    $prepare = $con->prepare('SELECT * FROM `products` WHERE 1 limit 100');
    $prepare->execute();
    $result = $prepare->get_result();
    $array = [];
    while ($row = $result->fetch_object()) {
        $array[] = $row;
    }
    return $array;
}

function addProductToCard_db($proID,$userID){
    $conn = connect_db();
    $prepare = $conn->prepare('INSERT INTO `user_product`(`id`, `userID`, `proID`) VALUES (null,?,?)');
    $prepare->bind_param('dd',$userID,$proID);
    $prepare->execute();
    if (!$prepare->errno) {
        return false;
    } else return $prepare->errno;

}

function getProductFromCart_db($id){
    $con = connect_db();
    $prepare = $con->prepare('SELECT * FROM `user_product` WHERE `userID`=? limit 100');
    $prepare->bind_param('d',$id);
    $prepare->execute();
    $result = $prepare->get_result();
    $array = [];
    while ($row = $result->fetch_object()) {
        $pro=getProductById($row->proID);
        $pro->rowID=$row->id;
        $array[] = $pro;
    }
    return $array;
}

function deleteFromCard_db($id){
    $con = connect_db();
    $prepare = $con->prepare('DELETE FROM `user_product` WHERE id=?');
    $prepare->bind_param('d', $id);
    $prepare->execute();
    if ($prepare->execute()) {
        return true;

    } else {
        return false;
    }
}

?>
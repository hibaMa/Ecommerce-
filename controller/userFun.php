<?php
session_start();
function regester(){
    if(isset($_POST["Fname"]) && isset($_POST["city"]) && isset($_POST["pass"])&&
        isset($_POST["Lname"]) && isset($_POST["email"]) ){

        if($_POST["Fname"].trim(" ")=="" ||  $_POST["pass"].trim(" ")=="" ||
           $_POST["Lname"].trim(" ")=="" || $_POST["email"].trim(" ")=="") {

            redirect("register.php?error=" . "fill all spaces");
        }

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            redirect("register.php?error=" . "invalid email");

        }

        $userExist=UserExist_db($_POST["email"]);
        if($userExist==="error"){
            redirect("register.php?error db");
        }
        if($userExist){
            redirect("register.php?error=email already exist");
        }

        $userInfo["fname"]=$_POST["Fname"];
        $userInfo["lname"]=$_POST["Lname"];
        $userInfo["city"]=$_POST["city"];
        $userInfo["email"]=$_POST["email"];
        $userInfo["pass"]=sha1($_POST["pass"]);


        $result=regester_db($userInfo);
        if($result){
            redirect("register.php?error=adding " . $result);
        }else{
            redirect("register.php?goodSMS=added successfully");
        }

    }
    else redirect("register.php?error=" .  "setError");



}

function signIn(){
    if(isset($_POST["pass"])&& isset($_POST["email"])){
        if($_POST["pass"].trim(" ")=="" || $_POST["email"].trim(" ")=="") {
            redirect("signIn.php?error=" . "fill all spaces");
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            redirect("signIn.php?error=" . "invalid email");
        }

        $userInfo["email"]=$_POST["email"];
        $userInfo["pass"]=sha1($_POST["pass"]);

        $result=signIn_db($userInfo);
        if(!$result){
            redirect("signIn.php?error=wrong email or password");
        }else{
            $_SESSION['user']=$result->id;
            redirect("home.php?goodSMS=welcome&userEmail=".$_POST["email"]);
        }
    }
    else redirect("signIn.php?error=" .  "error");
}

function getUserByEmail($email){
    return getUserByEmail_db($email);
}

function signOut(){
    session_unset();
    session_destroy();
    redirect("signIn.php");
}




?>

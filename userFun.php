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
        $userInfo['user_activation_code']=generateRandomString();
        $userInfo['user_email_status']='not verified';

        $result=regester_db($userInfo);
        if($result){
            redirect("register.php?error=adding " . $result);
        }else{
            $mail_body = "
			<p>Hi ".$userInfo["fname"].",</p>
			<p>Thanks for Registration. Your password is ".$_POST["pass"].", This password will work only after your email verification.</p>
			<p>Please Open this link to verified your email address - "."<a href='http://localhost/itg/Ecommerce-/email_verification.php?activation_code=".$userInfo['user_activation_code']."'>email verification</a>"
			."<p>Best Regards,<br />web name</p>";

            if(send_email($userInfo["email"],$userInfo["fname"],"Email Verification",$mail_body)){
                    redirect("register.php?goodSMS=Register Done, Please check your mail");
                }else{
                    redirect("register.php?error=failed-");

                }
        }

    }
    else redirect("register.php?error=" .  "setError");
}

function send_email($to, $usrename, $subject, $message)
{
    $transport = Swift_SmtpTransport::newInstance('in-v3.mailjet.com', 587)
        ->setUsername('7c88626f327380a714b75b3b08d4006d')
        ->setPassword('aa8630cfb83821b92a873bf5621792a2');

    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance($subject)
        ->setFrom(array('hibamalhiss@gmail.com' => 'web'))
        ->setTo(array($to => $usrename))
        ->setBody($message, 'text/html');

    if ($mailer->send($message)) {
        return true;
    } else {
        return false;
    }
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
        if(is_string($result)){
            redirect("signIn.php?error=".$result);
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

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function get_user_by_id($id){
    return get_user_by_id_db($id);
}


//function regester(){
//    if(isset($_POST["Fname"]) && isset($_POST["city"]) && isset($_POST["pass"])&&
//        isset($_POST["Lname"]) && isset($_POST["email"]) ){
//
//        if($_POST["Fname"].trim(" ")=="" ||  $_POST["pass"].trim(" ")=="" ||
//            $_POST["Lname"].trim(" ")=="" || $_POST["email"].trim(" ")=="") {
//
//            redirect("register.php?error=" . "fill all spaces");
//        }
//
//        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
//            redirect("register.php?error=" . "invalid email");
//
//        }
//
//        $userExist=UserExist_db($_POST["email"]);
//        if($userExist==="error"){
//            redirect("register.php?error db");
//        }
//        if($userExist){
//            redirect("register.php?error=email already exist");
//        }
//
//        $userInfo["fname"]=$_POST["Fname"];
//        $userInfo["lname"]=$_POST["Lname"];
//        $userInfo["city"]=$_POST["city"];
//        $userInfo["email"]=$_POST["email"];
//        $userInfo["pass"]=sha1($_POST["pass"]);
//
//
//        $result=regester_db($userInfo);
//        if($result){
//            redirect("register.php?error=adding " . $result);
//        }else{
//
//            redirect("register.php?goodSMS=added successfully");
//        }
//
//    }
//    else redirect("register.php?error=" .  "setError");
//}
?>

<?php
/**
 * Created by PhpStorm.
 * User: user
* Date: 6/5/2018
* Time: 3:06 PM
*/
include_once "controller.php";

if(isset($_GET['activation_code']))
{
    $Error=verify_email_db($_GET['activation_code']);
    if($Error){
        redirect("register.php?error=verification error ".$Error);
    }else{
        redirect("signIn.php?goodSMS=your email is verified ");
    }

}


function verify_email_db($code){
    $verified='verified';
    $con = connect_db();
    $prepare = $con->prepare('SELECT * FROM `user_tbl` WHERE `user_activation_code`=?');
    $prepare->bind_param("s",$code);
    $prepare->execute();
    $result = $prepare->get_result();
    if($result->num_rows){
        foreach($result as $row)
        {
            if($row['user_email_status'] == 'not verified'){
                $conn = connect_db();
                $prepare = $conn->prepare('UPDATE `user_tbl` SET `user_email_status`=? WHERE `user_activation_code`=?');
                $prepare->bind_param('ss',$verified,$code);
                $prepare->execute();
                if (!$prepare->errno) {
                    return false;
                } else return "".$prepare->errno;
            }
        }
    }else{
       return"verification error not found ";
    }
}
<?php
include_once "header.php";
?>
<div class="container">
    <h1 class="regTitle">Registration Form</h1>
    <form action="controller.php?action=register" method="post" >
        <div> first name : <input name="Fname" type="text"/></div>
        <div>last name  : <input name="Lname" type="text"/></div>
        <div>Email : <input name="email" type="text" class="regEmail"/></div>
        <div>Password : <input name="pass" type="password"/></div>
        <div>city :
            <select name="city" id="">
                <option value="nablus">nablus</option>
                <option value="hebron">hebron</option>
                <option value="yafa">yafa</option>
            </select></div>
        <div class="buttonDiv">
            <input type="submit" value="register" class="button regBtn">
            <a  href="signIn.php" class="button">signIn</a>
        </div>
    </form>
</div>


<link rel="stylesheet"  href="style/form.css" >
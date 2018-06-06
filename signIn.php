
<?php
include_once "controller.php";
$user = new stdClass();
if (isset($_SESSION['user'])) {
    $user = get_user_by_id($_SESSION['user']);
}
else{
    $user->id=-1;
}

if(isset($_GET['goodSMS'])){
    echo "<div class='goodSMS SMS'>". "Done!".$_GET['goodSMS']."<br><br></div>";
}
if(isset($_GET['error'])){
    echo "<div class='errorSMS SMS'>"."Error!".$_GET['error']."<br><br></div>";
}
?>

<div class="container">
    <h1 class="signTitle">Sign in Form</h1>
    <form action="controller.php?action=signIn" method="post">
        <div>Email : <input name="email" type="text" class="signEmail"/></div>
        <div>Password : <input name="pass" type="password"/></div>
        <div>
            <input type="submit" value="signIn" class="button regBtn">
            <a  href="register.php" class="button">register</a>
        </div>
    </form>
</div>
<link rel="stylesheet"  href="style/form.css" >
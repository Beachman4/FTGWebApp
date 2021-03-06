<?php
session_start();
// if Logged in already, redirect to home page
if (isset($_SESSION['username'], $_SESSION['user_id'])) {
    header("Location:/home/");
}
include($_SERVER['DOCUMENT_ROOT']."system/controller/ftgcontroller.php");

$con = mysqli_connect($hostname, $dbuser, $dbpass, $db);
$ftgcontroller = new ftgcontroller;
//whitelist check
/*
if ($ftgcontroller->checkip() == false) {
    header("Location:/noaccess.php");
}
*/
if (isset($_POST['login'], $_POST['password'])) {
    //Sanitize strings
    $username = $con->real_escape_string($_POST['login']);
    $password = $con->real_escape_string($_POST['password']);
    if ($ftgcontroller->loginhandler(strtolower($username), $password, $con)) {
        header('Location: /home/index.php');
    }
}
?>
<html>
    <head>
        <link rel="shortcut icon" href="/favicon.ico" type="image/png">
        <title>FTG Admin Panel</title>
        <link rel="stylesheet" href="/public/css/bootstrap.css" />
        <link rel="stylesheet" href="/public/css/bootstrap-theme.css" />
        <link rel="stylesheet" href="/public/css/admin_login.css" />
        <link rel="stylesheet" href="/public/css/form.css" />
        <script src="/public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="/public/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/public/js/admin_login.js" type="text/javascript"></script>
    </head>
    <body>
        <section class="main">
			<form class="form-3" method="post" action="index.php" style="margin: 60px auto 30px;">
			    <p class="clearfix">
			        <label for="login">Username</label>
			        <input type="text" name="login" id="login" placeholder="Username">
			    </p>
			    <p class="clearfix">
			        <label for="password">Password</label>
			        <input type="password" name="password" id="password" placeholder="Password"> 
			    </p>
			    <p class="clearfix">
			        
			    </p>
			    <p class="clearfix">
			        <input type="submit" name="submit" value="Sign in">
			    </p>       
			</form>
		</section>
    </body>
</html>
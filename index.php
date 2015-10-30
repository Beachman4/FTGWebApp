<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/system/controller/ffgcontroller.php");

$con = mysqli_connect($hostname, $dbuser, $dbpass, $db);
$ffgcontroller = new ffgcontroller();
//whitelist check
/*
if ($ffgcontroller->checkip() == false) {
    header("Location:/index.php");
}
*/
if (isset($_POST['login'], $_POST['password'])) {
    if ($ffgcontroller->loginhandler($_POST['login'], $_POST['password'], $con) == true) {
        header('Location: /home/index.php');
    }
}
?>
<html>
    <head>
        <title>FFG Admin Panel</title>
        <link rel="stylesheet" href="/public/css/bootstrap.css" />
        <link rel="stylesheet" href="/public/css/bootstrap-theme.css" />
        <link rel="stylesheet" href="/public/css/admin_login.css" />
        <script src="/public/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="/public/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/public/js/admin_login.js" type="text/javascript"></script>
    </head>
    <body>
        <h1 class="CName"><?php echo CName ?></h1>
        <section class="main">
			<form class="form-3" method="post" action="index.php">
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
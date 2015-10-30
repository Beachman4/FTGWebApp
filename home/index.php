<?php
session_start();
if (!(isset($_SESSION['username'], $_SESSION['user_id']))) {
    header('Location: /database_web/index.php');
}
?>
<html>
    <head>
        <link rel="shortcut icon" href="/favicon.ico" type="image/png">
        <title>FTG Admin Panel</title>
        <link rel="stylesheet" href="/public/css/bootstrap.css" />
        <link rel="stylesheet" href="/public/css/bootstrap-theme.css" />
        <link rel="stylesheet" href="/public/css/home.css" />
        <script type="text/javascript" src="/public/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="sidebar">
            <div class="links">
                <ul id="links">
                    <li class="active"><a href="#"><p>Home</p></a></li>
                    <li><a href="#"><p>Search</p></a></li>
                    <li><a href="#"><p>Settings</p></a></li>
                    <li><a href="#"><p>Logout</p></a></li>
                </ul>
            </div>
        </div>
    </body>
</html>
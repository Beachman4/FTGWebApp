<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT'].'/system/controller/ftgcontroller.php');
//Check if user is logged in
$ftgcontroller = new ftgcontroller;
$ftgcontroller->checklogin();

?>
<html>
    <head>
        <link rel="shortcut icon" href="/favicon.ico" type="image/png">
        <title>FTG Admin Panel</title>
        <link rel="stylesheet" href="/public/css/bootstrap.css" />
        <link rel="stylesheet" href="/public/css/bootstrap-theme.css" />
        <link rel="stylesheet" href="/public/css/home.css" />
        <link rel="stylesheet" href="/public/css/form.css" />
        <script type="text/javascript" src="/public/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/public/js/ftgfunction.js"></script>
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
        <div class="status">
            <h1 style="text-align: center;">**TODO**  Add player status, new player stats</h1>
        </div>
        <div class="mainbody">
            <span class="addplayerbutton">
                <button id="addplayerbutton" class="btn btn-default" onClick="ftgfunctions.showaddplayerform();" type="button">Add a Player</button>
            </span>
            <div class="Addplayer">
                <form method="post" class="form-3" action="index.php">
                    <input type="text" name="name" id="name" placeholder="Player Name">
                    <input type="text" name="uid" id="uid" placeholder="Player UID">
                    <p style="width: 100%;">
                        <input type="submit" name="submit" value="Create Player Account" />
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>
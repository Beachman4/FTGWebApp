<?php
session_start();
if (!(isset($_SESSION['username']))) {
	header('Location: /database_web/index.php');
}

echo "IT WORKS YAY!!!!!";

?>
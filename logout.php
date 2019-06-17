<?php
ob_start();

$_SESSION=array();

session_start();
session_unset();
session_destroy();

header("Location: index.php");
exit();
ob_flush();
?>
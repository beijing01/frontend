<?php
// ob_start();
// require_once 'users.php';
// session_start();

ob_start();
session_start();
require_once 'ConnectDatabase.php';

$id=$_GET['id'];


if (isset($_GET['id']) and isset($_SESSION['normalusername'])) {
    
    $query = <<<END
DELETE FROM rooms WHERE id = '$id'
END;
   
    $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);
    
    if($mysqli->query($query)===True)
    {
        header("Location:rooms.php");
    }
    
}
ob_flush();
?>
<?php


ob_start();
session_start();
require_once 'ConnectDatabase.php';

$id=$_GET['id'];


if (isset($_GET['id']) and isset($_SESSION['normalusername'])) {
    
    $query = <<<END
DELETE FROM devices WHERE id = '$id'
END;
    echo $query;
    $mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);
    
    if($mysqli->query($query)===True)
    {
        header("Location:devices.php");
    }
    
}
ob_flush();
?>
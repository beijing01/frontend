<?php
$host       = "localhost";
$user       = "honliu18"; // e.g. evanil18
$pwd        = "gcZn5qrDhF"; // e.g takeAbath@06h30
$db         = "honliu18_db"; // e.g evanil18_db
$mysqli    = new mysqli($host, $user, $pwd, $db);
$conn = new mysqli($host, $user, $pwd, $db);

$ip=$_SERVER['REMOTE_ADDR'];
$url=$_SERVER["REQUEST_URI"];
$current=date('Y-m-d H:i:s');

$query=<<<END
INSERT INTO analytics(ip,page,time)
VALUES('$ip','$url','$current')
END;

if($mysqli->query($query)!==True)
{
    echo "";
}
?>
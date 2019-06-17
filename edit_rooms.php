<?php
ob_start();
session_start();
require_once 'ConnectDatabase.php';


  // Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if(isset($_GET['id']))
{
    $_SESSION['id']=$_GET['id'];
}

if( isset($_POST['submit']) and isset($_SESSION['normalusername']))
{
        
        $name=$_POST['editName'];
        $id= $_SESSION['id'];
       
        $query=<<<END
    UPDATE rooms
    SET r_name = '$name'
    where id='$id'
END;

if($mysqli->query($query)===True)
{

    header("Location:rooms.php");
    
}
}

$query = <<<END
SELECT * FROM rooms
WHERE id = '{$_GET['id']}'
END;

$res = $mysqli->query($query);
if ($res->num_rows > 0) {
$row = $res->fetch_object();

$_SESSION['editName']=$row->r_name;



}


ob_flush();
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
	
    <title>UPDATE DATA</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  
    
  </head>

  <body class="text-center">
    <form class="form-signin" action="edit_rooms.php" method="post">
      <img class="mb-4" src="favicon.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please edit</h1>
     
      <input  id="inputName" class="form-control" name="editName" value="<?php echo $_SESSION['editName']?>" placeholder="room name" required autofocus>
     
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Edit The Room</button>
      <a  href="rooms.php" >Turn back to users page</a>
      
     
    </form>
    
  </body>
 



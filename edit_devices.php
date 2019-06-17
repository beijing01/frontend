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
    
    $editroomname=$_POST['editroomname'];
    $editdevicename=$_POST['editdevicename'];
    $status=$_POST['editStatus'];
    $id= $_SESSION['id'];

    


$search=<<<END
SELECT * from devices where d_room='$editroomname'
END;


$result=$mysqli->query($search);

if($result->num_rows>0)
{

$query=<<<END
             UPDATE devices
             SET d_room='$editroomname',
             d_name='$editdevicename',
             status='$status'
             where id='$id'
END;


if($mysqli->query($query)===True)
{
    
    header("Location:devices.php");
    
}
else
{
    echo "<script type=text/javascript>alert('Could not query database')</script>";
}

}
else
{
    echo "<script type=text/javascript>alert('Could not query database')</script>";
}

}



$querys = <<<END
SELECT * FROM devices
WHERE id = '{$_GET['id']}'
END;

$res = $mysqli->query($querys);

if ($res->num_rows > 0) {
  
$row = $res->fetch_object();
    
$_SESSION['editroomname']=$row->d_room;
$_SESSION['editdevicename']=$row->d_name;
$_SESSION['editStatus']=$row->status;

    
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
    <form class="form-signin" action="edit_devices.php" method="POST">
      <img class="mb-4" src="favicon.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please edit</h1>
     
      <input  id="inputName" class="form-control" name="editroomname" value="<?php echo $_SESSION['editroomname']?>" placeholder="room name" required autofocus>
      <input  id="inputName" class="form-control" name="editdevicename" value="<?php echo $_SESSION['editdevicename']?>" placeholder="device name" required autofocus>
      <input  id="inputName" class="form-control" name="editStatus" value="<?php echo $_SESSION['editStatus']?>" placeholder="status" required autofocus>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Edit The Room</button>
      <a  href="devices.php" >Turn back to devices page</a>
      
     
    </form>
    
  </body>
 



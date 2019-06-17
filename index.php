<?php
session_start();
ob_start();
$_SESSION['normalusername']=$_POST['normalusername'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
	
    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  
    
  </head>

  <body class="text-center">
    <form class="form-signin" action="index.php" method="post">
      <img class="mb-4" src="favicon.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      
      <input type="username" id="inputName" class="form-control" name="username" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name ="password" placeholder="Password" required>
<!--       <div class="checkbox mb-3"> -->
<!--         <label> -->
<!--           <input type="checkbox" name="Remember" value="Adm">Remember me<br> -->
<!--         </label> -->
<!--       </div> -->
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
      Don't have an account? <a  href="Register.php" >Sign up</a>
     
    </form>
   
    
    
  </body>
     <?php
     
     if( isset($_POST['submit'])){     
//          $host = "localhost:3306";
//          $user = "root";
//          $pwd = "lhy942821";
//          $db = "project";
         $host       = "localhost";
         $user       = "honliu18"; // e.g. evanil18
         $pwd        = "gcZn5qrDhF"; // e.g takeAbath@06h30
         $db         = "honliu18_db"; // e.g evanil18_db
         
         
         $mysqli = new mysqli($host, $user, $pwd, $db);
         if(isset($_POST['username']) and isset($_POST['password'])){
             $name=$mysqli->real_escape_string($_POST['username']);
             $pwd=$mysqli->real_escape_string($_POST['password']);
             $userPermission=$mysqli->real_escape_string($_POST['User']);
             
             $query=<<<END
            SELECT id,name,permission FROM users
            where name='$name' 
            AND password='$pwd'

END;
             
             #if username and password is not empty
             
             $result=$mysqli->query($query);
           
             
             if($result->num_rows>0)
             {
                 $row=$result->fetch_object();
                 
                 
                 $_SESSION['normalusername']=$row->name;
                
                 #if permission equal Adm then redirect to Adm
                 #else redirect to ...
                 
                 
                 header("Location: home.php");
                     
                 
              
             }
             else
             {
                 echo "<script type=text/javascript>alert('Wrong username or password')</script>";
             }
         }
     }
     ob_flush();
     
     
//      if(isset($_POST['username']) and isset($_POST['password'])){
//          $name=$mysqli->real_escape_string($_POST['username']);
//          $pwd=$mysqli->real_escape_string($_POST['password']);
         
//          $query=<<<END
//         SELECT username,password,id FROM users
//         where username='$name'
//         AND password='$pwd'
// END;
//          #if username and password is not empty
//          $result=$mysqli->query($query);
//          if($result->num_rows>0)
//          {
//              $row=$result->fetch_object();
//              $_SESSION["username"]=$row->username;
//              #echo $_SESSION["username"];
//              $_SESSION["userId"]=$row->id;
//              header("Location: menu.php");
//              exit();
//          }
//          else
//          {
//              echo "Wrong username or password.Try again";
//          }
//      }
?>
</html>

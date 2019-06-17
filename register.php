<?php

ob_start();

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
    <form class="form-signin" action="register.php" method="post">
      <img class="mb-4" src="favicon.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="username" id="inputName" class="form-control" name="registername" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name ="registerpwd" placeholder="Password" required>
<!--       <div class="checkbox mb-3"> -->
<!--         <label> -->
<!--           <input type="radio" value="remember-me"> Remember me -->
<!--           <input type="radio" value="remember-me"> Remember me -->
<!--         </label> -->
<!--       </div> -->
<!--       <div class="checkbox mb-3"> -->
<!--         <label> -->
<!--           <input type="radio" name="Remember" value="Adm">Adm<br> -->
<!--           <input type="radio" name="Remember" value="Adm">User<br> -->
<!--         </label> -->
<!--       </div> -->
	
      <button class="btn btn-lg btn-primary btn-block" name="newUser" type="submit">Register</button>
      <a  href="index.php" >Turn back to Login page</a>
      
     
    </form>
   
    
    
  </body>
     <?php
     
     
    
     
     if( isset($_POST['newUser'])){
         
//          $host = "localhost:3306";
//          $user = "root";
//          $pwd = "lhy942821";
//          $db = "project";
         $host       = "localhost";
         $user       = "honliu18"; // e.g. evanil18
         $pwd        = "gcZn5qrDhF"; // e.g takeAbath@06h30
         $db         = "honliu18_db"; // e.g evanil18_db
         $mysqli = new mysqli($host, $user, $pwd, $db);
         if ($mysqli->connect_error) {
             die("Connection failed: " . $mysqli->connect_error);
         } 

         if(isset($_POST['registername']) and isset($_POST['registerpwd']) ){
              
             $name=$mysqli->real_escape_string($_POST['registername']);
             $pwd=$mysqli->real_escape_string($_POST['registerpwd']);
             $userPermission="User";
            
             $query=<<<END
             INSERT INTO users(name,password,permission)
             VALUES('$name','$pwd','$userPermission');
END;
             #if username and password is not empty
             
             if($mysqli->query($query)===TRUE)
             {
                 echo "<script type=text/javascript>alert('Register Successfully')</script>";
                 header("Location:index.php");
             }
             else
             {
                 echo "<script type=text/javascript>alert('Register again')</script>";
                 header("Location:register.php");
             }
         }
     }
     
     
     ob_flush();
     

?>
</html>

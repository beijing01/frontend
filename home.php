<?php
include "menu.php";
require_once 'ConnectDatabase.php';
require_once 'record_ip.php';
?>
<!DOCTYPE html>
<!-- saved from url=(0054)https://getbootstrap.com/docs/4.3/examples/dashboard/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
<link href="./adminPage_files/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./adminPage_files/dashboard.css" rel="stylesheet">
  <style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>
  <body>

<div class="col-md-10 offset-md-2">
<div class="row justify-content-md-center">">
<div class="container">
  <div class="card-deck mb-3 text-center">
  
  <!-- - -->

<?php 
  
if(isset($_SESSION['normalusername']))
{
if ($mysqli->connect_error) 
{
  die("Connection failed: " . $mysqli->connect_error);
}
     
$query1=<<<END
SELECT * from rooms
END;
$arr= array();
$result=$mysqli->query($query1);






while ($arr=mysqli_fetch_array($result)) {

$name= $arr['r_name'];


$arrdevice=array();


$query2=<<<END
SELECT * from devices where d_room='$name'
END;
    
$res=$mysqli->query($query2);





$content1=<<<END
<div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">$name</h4>
      </div>
      <div class="card-body">
        <table class="table mt-3 mb-4">
              <thead>
                <tr>
                  <th scope="col">Device</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
END;

$content2=null;
while($arrdevice=mysqli_fetch_array($res))
{
$Id=$arrdevice['id'];
$deviceName=$arrdevice['d_name'];
$status=$arrdevice['status'];
if($status=='on')
{
$content2.=<<<END
<tr>
  <th scope="row">$deviceName</th>
  <td>
    <div class="custom-control custom-switch">
    
      <input type="checkbox" class="custom-control-input" id=".$Id." checked>
      
      <label class="custom-control-label" for=".$Id."></label>
    </div>
  </td>
</tr>
END;
}
else
{
$content2.=<<<END
<tr>
  <th scope="row">$deviceName</th>
  <td>
    <div class="custom-control custom-switch">
    
      <input type="checkbox" class="custom-control-input" id=".$Id.">
      
      <label class="custom-control-label" for=".$Id."></label>
    </div>
  </td>
</tr>
END;
}



}

$content3=<<<END
              </tbody>
            </table>
        <button type="button" class="btn btn-lg btn-block btn-primary"></button>
      </div>
    </div>
END;
echo $content1;
echo $content2;
echo $content3;
}
}
  ?>
    
    
    <!-- - -->
    
    
    
    <!-- - -->
    
    
    
    
    
    <!-- - -->
<!--     <div class="card mb-4 shadow-sm"> -->
<!--       <div class="card-header"> -->
<!--         <h4 class="my-0 font-weight-normal">Bathroom</h4> -->
<!--       </div> -->
<!--       <div class="card-body"> -->
<!--         <table class="table mt-3 mb-4"> -->
<!--               <thead> -->
<!--                 <tr> -->
<!--                   <th scope="col">Device</th> -->
<!--                   <th scope="col">Status</th> -->
<!--                 </tr> -->
<!--               </thead> -->
<!--               <tbody> -->
<!--                 <tr> -->
<!--                   <th scope="row">Lamp </th> -->
<!--                   <td> -->
<!--                     <div class="custom-control custom-switch"> -->
<!--                       <input type="checkbox" class="custom-control-input" id="customSwitch5"> -->
<!--                       <label class="custom-control-label" for="customSwitch5"></label> -->
<!--                     </div> -->
<!--                   </td> -->
<!--                 </tr> -->
<!--                 <tr> -->
<!--                   <th scope="row">Towel rack</th> -->
<!--                   <td> -->
<!--                     <div class="custom-control custom-switch"> -->
<!--                       <input type="checkbox" class="custom-control-input" id="customSwitch6"> -->
<!--                       <label class="custom-control-label" for="customSwitch6"></label> -->
<!--                     </div> -->
<!--                   </td> -->
<!--                 </tr> -->
<!--               </tbody> -->
<!--             </table> -->
<!--         <button type="button" class="btn btn-lg btn-block btn-primary">Add</button> -->
<!--       </div> -->
<!--     </div> -->
    
    <!--  -->
  
    
  </div>
</div>
</div>
</div>
 
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active " href="home.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="devices.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              Devices <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rooms.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              Rooms <span class="sr-only">(current)</span>
            </a>
          </li>
<!--           <li class="nav-item"> -->
<!--             <a class="nav-link" href="users.php"> -->
<!--               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> -->
<!--               Users<span class="sr-only">(current)</span> -->
<!--             </a> -->
<!--           </li> -->
<!--           <li class="nav-item"> -->
<!--             <a class="nav-link" href="analytics.php"> -->
<!--               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg> -->
<!--               Analytics<span class="sr-only">(current)</span> -->
<!--             </a> -->
<!--             </li> -->
        </ul>
      </div>
    </nav>
  </div>
</div>

</body>



</html>
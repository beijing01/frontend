<?php
  include('menu.php');
  require_once 'ConnectDatabase.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #7f8287;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<?php
#$conn = mysqli_connect("localhost", "lotfur18", "o7WO6OlRUK", "lotfur18_db");
#$mysqli = mysqli_connect("localhost:3306", "root", "lhy942821", "project");

  // Check connection
if($_SESSION['normalusername'])
{
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    if (isset($_POST['roomname']) and isset($_POST['devicename'])) {
        $roomname=$mysqli->real_escape_string($_POST['roomname']);
        $devicename=$mysqli->real_escape_string($_POST['devicename']);
        
        $search=<<<END
SELECT * from rooms where r_name='$roomname'
END;
        
        $result=$mysqli->query($search);
        
        
        if($result->num_rows>0)
        {
            $query=<<<END
             INSERT INTO devices(d_room,d_name)
             VALUES('$roomname','$devicename');
END;
            
            if ($mysqli->query($query) !== TRUE) {
                die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);
                echo "<script type=text/javascript>alert('Could not query database')</script>";
            }
            
        }
        
        
        header('Location:devices.php');
        
    }
}

ob_flush();
?>

<body>

<button class="open-button" onclick="openForm()">Add device</button>

<div class="form-popup" id="myForm">
  <form action="devices.php" class="form-container" method="post">
    <h1>Add new device</h1>

    <label for="room"><b>Room</b></label>
    <input type="text" placeholder="Enter room name" name="roomname" required>

    <label for="name"><b>Device name</b></label>
    <input type="text" placeholder="Enter device name" name="devicename" required>

    <button type="submit" class="btn">Add</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>
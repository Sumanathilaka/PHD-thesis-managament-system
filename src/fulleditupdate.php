<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
       
 
<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
// Create connection
$conn = new mysqli($servername, $username, $password, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

      $name=mysqli_real_escape_string($conn, $_POST['name']);
	   $rollno=mysqli_real_escape_string($conn, $_POST['rollno']);
      $email=mysqli_real_escape_string($conn, $_POST['emailid']);
      $department=mysqli_real_escape_string($conn, $_POST['department']);
      $guide=mysqli_real_escape_string($conn, $_POST['guidance']);
      $guide_emailid=mysqli_real_escape_string($conn, $_POST['guide_emailid']);
      $topic=mysqli_real_escape_string($conn, $_POST['topic']);
      $guide2=mysqli_real_escape_string($conn, $_POST['guide2']);
	   $roll=mysqli_real_escape_string($conn, $_POST['roll']);
	 

$sql =  "UPDATE project SET rollno='$rollno' WHERE rollno='$roll' ";
$sql2 = "UPDATE project SET topic='$topic' WHERE rollno='$roll' ";
$sql5 = "UPDATE mtechstudent SET name='$name' WHERE rollno='$roll' ";
$sql6 = "UPDATE mtechstudent SET rollno='$rollno' WHERE rollno='$roll' ";
$sql7 = "UPDATE mtechstudent SET email='$email' WHERE rollno='$roll' ";
$sql8 = "UPDATE mtechstudent SET department='$department' WHERE rollno='$roll' ";
$sql9 = "UPDATE mtechstudent SET guide='$guide' WHERE rollno='$roll' ";
$sql10 = "UPDATE mtechstudent SET guidemail='$guide_emailid' WHERE rollno='$roll' ";
$sql19 = "UPDATE mtechstudent SET guide2='$guide2' WHERE rollno='$roll' ";
$result= mysqli_query($conn, $sql);
$result1= mysqli_query($conn, $sql2);
$result5= mysqli_query($conn, $sql5);
$result6= mysqli_query($conn, $sql6);
$result7= mysqli_query($conn, $sql7);
$result8= mysqli_query($conn, $sql8);
$result9= mysqli_query($conn, $sql9);
$result9= mysqli_query($conn, $sql19);	



if (mysqli_query($conn, $sql10) === TRUE) {
   echo "<script>alert('Details Added');window.location.href='adminhome.php';</script>";
} else {
         echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);

?>







   </body>
</html>

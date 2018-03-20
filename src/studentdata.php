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
      $status=mysqli_real_escape_string($conn, $_POST['status']);
      $date=mysqli_real_escape_string($conn, $_POST['date']);
	   
	 $sql = " INSERT INTO mtechstudent(name,rollno,email,department,guide,guidemail) VALUES 
('$name','$rollno','$email','$department','$guide','$guide_emailid')";

   $sql2 = " INSERT INTO project(rollno,topic,status,date) VALUES 
('$rollno','$topic','$status','$date')";

if (mysqli_query($conn, $sql) === TRUE) {
   echo "";
} else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $sql2) === TRUE) {
   echo "<script>alert('Details Added');window.location.href='adminhome.php';</script>";
} else {
         echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);

?>







   </body>
</html>

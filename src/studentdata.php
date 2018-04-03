<?php
session_start();
if(!isset($_SESSION['username'])) {
        header('Location:index.php');
	}
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
     
      $department=mysqli_real_escape_string($conn, $_POST['department']);
      $guide=mysqli_real_escape_string($conn, $_POST['guidance']);
      $guide_emailid=mysqli_real_escape_string($conn, $_POST['guide_emailid']);
      $guide2=mysqli_real_escape_string($conn, $_POST['guidance2']);
      $topic=mysqli_real_escape_string($conn, $_POST['topic']);
      $status1=mysqli_real_escape_string($conn, $_POST['status1']);
      $date1=mysqli_real_escape_string($conn, $_POST['date1']);
      $status2=mysqli_real_escape_string($conn, $_POST['status2']);
      $date2=mysqli_real_escape_string($conn, $_POST['date2']);
	   $tdate=mysqli_real_escape_string($conn, $_POST['tdate']);
	   $ddate=mysqli_real_escape_string($conn, $_POST['ddate']);
	   $edate=mysqli_real_escape_string($conn, $_POST['edate']);
	echo $tdate;


	 $sql = " INSERT INTO mtechstudent(name,rollno,department,guide,guidemail,guide2) VALUES
('$name','$rollno','$department','$guide','$guide_emailid','$guide2')";

   $sql2 = " INSERT INTO project(rollno,topic,status1,date1,status2,date2,thesisdate,evalutiondate,defensedate) VALUES
('$rollno','$topic','$status1','$date1','$status2','$date2','$tdate','$edate','$ddate')";

$ex1=1;
$ex2=2;
   $sql3 = " INSERT INTO history(rollno,status,datemodify,role) VALUES
('$rollno','$status1','$date1','$ex1')";
   $sql4 = " INSERT INTO history(rollno,status,datemodify,role) VALUES
('$rollno','$status2','$date2','$ex2')";

if (mysqli_query($conn, $sql) === TRUE) {
   echo "";
} else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $sql4) === TRUE) {
   echo "";
} else {
         echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
}


if (mysqli_query($conn, $sql3) === TRUE) {
   echo "";
} else {
         echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
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

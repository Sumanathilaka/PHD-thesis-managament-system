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


$roll=mysqli_real_escape_string($conn, $_POST['rollno']);
$status1=mysqli_real_escape_string($conn, $_POST['status1']);
$date1=mysqli_real_escape_string($conn, $_POST['date1']);
$status2=mysqli_real_escape_string($conn, $_POST['status2']);
$date2=mysqli_real_escape_string($conn, $_POST['date2']);

$sql0 = "UPDATE project SET date1='$date1' WHERE rollno='$roll' ";
$sql1 = "UPDATE project SET status1='$status1' WHERE rollno='$roll' ";
$sql2 = "UPDATE project SET date2='$date2' WHERE rollno='$roll' ";
$sql3 = "UPDATE project SET status2='$status2' WHERE rollno='$roll' ";
$sql4 = "SELECT * FROM history WHERE rollno = '$roll' AND status ='$status1' AND datemodify ='$date1'";
$sql5 = "SELECT * FROM history WHERE rollno = '$roll' AND status ='$status2' AND datemodify ='$date2'";
  $sql6 = " INSERT INTO history(rollno,status,datemodify,role) VALUES
('$roll','$status1','$date1',1)";
$sql7 = " INSERT INTO history(rollno,status,datemodify,role) VALUES
('$roll','$status2','$date2',2)";

$result0=mysqli_query($conn,$sql0);
$result1=mysqli_query($conn,$sql1);
$result2=mysqli_query($conn,$sql2);
$result3=mysqli_query($conn,$sql3);
$result4=mysqli_query($conn,$sql4);
$result5=mysqli_query($conn,$sql5);



if (mysqli_num_rows($result4) < 1) {
  $result6=mysqli_query($conn,$sql6);
}
if (mysqli_num_rows($result5) < 1) {
  $result7=mysqli_query($conn,$sql7);
}
 echo "<script>alert('Details edited successfully');window.location.href='adminhome.php';</script>";



mysqli_close($conn);

?>

 </body>
</html>

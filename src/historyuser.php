<?php
session_start();
if(!isset($_SESSION['username'])) {
        header('Location:index.php');
	}
  $status1 = array
    (
      array("SynMailtoE1L1-1",14),
      array("SynRem1toE1L1-1",7),
      array("SynRem2toE1L1-1",7),
      array("SynMailtoE1L1-2",14),
      array("SynRem1toE1L1-2",7),
      array("SynRem2toE1L1-2",7),
      array("SynMailtoE1L1-3",14),
      array("SynRem1toE1L1-3",7),
      array("SynRem2toE1L1-3",7),
      array("SynMailtoE1L1-4",14),
      array("SynRem1toE1L1-4",7),
      array("SynRem2toE1L1-4",7),
      array("SynMailtoE1L2-1",14),
      array("SynRem1toE1L2-1",7),
      array("SynRem2toE1L2-1",7),
      array("SynMailtoE1L2-2",14),
      array("SynRem1toE1L2-2",7),
      array("SynRem2toE1L2-2",7),
      array("SynMailtoE1L2-3",14),
      array("SynRem1toE1L2-3",7),
      array("SynRem2toE1L2-3",7),
      array("SynMailtoE1L2-4",14),
      array("SynRem1toE1L2-4",7),
      array("SynRem2toE1L2-4",7),
      array("E1ReadyForThesisReview",365),
      array("ThesisSentToE1",45),
      array("ThesisE1Rem1",7),
      array("ThesisE1Rem2",7),
      array("ThesisE1Rem3",7),
      array("ThesisE1Rem4",7),
      array("E1ApprovedThesis",7),
      array("E1ApprovedHonInitiated",365)
     );
     $status2 = array
       (
         array("SynMailtoE2L1-1",14),
         array("SynRem1toE2L1-1",7),
         array("SynRem2toE2L1-1",7),
         array("SynMailtoE2L1-2",14),
         array("SynRem1toE2L1-2",7),
         array("SynRem2toE2L1-2",7),
         array("SynMailtoE2L1-3",14),
         array("SynRem1toE2L1-3",7),
         array("SynRem2toE2L1-3",7),
         array("SynMailtoE2L1-4",14),
         array("SynRem1toE2L1-4",7),
         array("SynRem2toE2L1-4",7),
         array("SynMailtoE2L2-1",14),
         array("SynRem1toE2L2-1",7),
         array("SynRem2toE2L2-1",7),
         array("SynMailtoE2L2-2",14),
         array("SynRem1toE2L2-2",7),
         array("SynRem2toE2L2-2",7),
         array("SynMailtoE2L2-3",14),
         array("SynRem1toE2L2-3",7),
         array("SynRem2toE2L2-3",7),
         array("SynMailtoE2L2-4",14),
         array("SynRem1toE2L2-4",7),
         array("SynRem2toE2L2-4",7),
         array("E2ReadyForThesisReview",365),
         array("ThesisSentToE2",45),
         array("ThesisE2Rem1",7),
         array("ThesisE2Rem2",7),
         array("ThesisE2Rem3",7),
         array("ThesisE2Rem4",7),
         array("E2ApprovedThesis",7),
         array("E2ApprovedHonInitiated",365)
        );
?>


<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="nitc.png">

<style>
#records {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
#records td, #records th {
    border: 1px solid #ddd;
    padding: 8px;
}
#records tr:nth-child(even){background-color: #f2f2f2;}
#records tr:hover {background-color: #ddd;}
#records th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #ce4012;
    color: white;
}
body{
    background-color: #f2f2f2;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button{
    background-color: #4CAF90;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;

}

input[type=text], select, textarea{
    width: 90%; /* Full width */
    padding: 12px; /* Some padding */
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

</style>
</head>


<body>
    <a href="guide.php"><img src="back.png" height="50px" width="50px"></a>
<center>
<h1>NATIONAL INSTITUTE OF TECHNOLOGY CALICUT</h1>
<h2>phD Student Project Management System</h2>

<h3 style="color:red;">History</h3></center>
<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name=mysqli_real_escape_string($conn, $_POST['name']);
$roll=mysqli_real_escape_string($conn, $_POST['rollno']);
echo "<h3>".$name."</h3>";
echo "<h3>".$roll."</h3><br>";

$sql = "SELECT *
FROM history
where rollno='$roll'AND role=1 ORDER BY datemodify";

$result= mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
echo "<h3>Examiner 1</h3>";
    echo  "<table id = 'records'>";
    echo "<tr>";
      echo  "<th>Status</th>";
      echo  "<th>Date</th>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result))
 {
   $statuse1= $row['status'];
   $s1=$status1[$statuse1][0];
	    	$new1=date_create($row['datemodify']);  
        echo "<tr><td>", $s1 , "</td><td>" ,date_format($new1,"d/m/Y") , "</td></tr>";
 }
 echo "</table> <br>";
}
else
    {echo "<p>No history for Examiner 1 found</p>";}

    $sql = "SELECT *
    FROM history
    where rollno='$roll'AND role=2 ORDER BY datemodify";

    $result= mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
echo "<h3>Examiner 2</h3>";
        echo  "<table id = 'records'>";
        echo "<tr>";
          echo  "<th>Status</th>";
          echo  "<th>Date</th>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result))
     {
       $statuse2= $row['status'];
       $s2=$status2[$statuse2][0];
			$new2=date_create($row['datemodify']);  
            echo "<tr><td>", $s2 , "</td><td>" , date_format($new2,"d/m/Y") , "</td></tr>";
     }
     echo "</table> <br>";
    }
    else
        echo "<p>No history for Examiner 2 found</p>";

mysqli_close($conn);
?>
    </center>
    <footer style="position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #333;
    color: white;
    text-align: center;"
  <center>
	<br>
	E1: Examiner 01 ,E2: Examiner 02 ,L1: List 1 ,L2:List 2 ,Synmail: Synopsis Sent ,SynRem: Synopsis Reminder Sent 
	<br>

  Logged in as :
    <?php
     echo $_SESSION['username'];
     ?>

  </center>
</footer>

</body>
</html>

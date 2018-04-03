<?php
session_start();
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
  array("E1ThesisReviewRecieved",7),
    array("E1ReviewRecdHonInitiated",365)
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
     array("E2ThesisReviewRecieved",7),
    array("E2ReviewRecdHonInitiated",365)
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

 <a href="https://accounts.google.com/Logout?&continue=https://appengine.google.com/_ah/logout?continue=https://newappc.herokuapp.com"><img src="123.png" height="50px" width="50px"></a>
<center>
<h1>NATIONAL INSTITUTE OF TECHNOLOGY CALICUT</h1>
<h2>phD Student Project Management System</h2></center>
<br><br>
<br><br>

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
$roll="";
$name=$_SESSION['username'];


$sql = "SELECT name,project.rollno,email,department,guide,guidemail,topic,status1,date1,status2,date2
FROM project,mtechstudent
where project.rollno=mtechstudent.rollno and guidemail='$name'";

$result= mysqli_query($conn, $sql);

$availability=0;

  echo  "<table id = 'records'>";
  echo "<tr>";
      echo  "<th>Name</th>";
      echo  "<th>Roll No</th>";
      echo  "<th>Project</th>";
      echo  "<th>Examiner1 Status</th>";
      echo  "<th>Last Modified Date</th>";
      echo  "<th>Examiner2 Status</th>";
      echo  "<th>Last Modified Date</th>";
      echo  "<th>History</th>";
  echo "</tr>";

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

             $availability=1;
              $roll=$row['rollno'];
              $statuse1= $row['status1'];
              $statuse2= $row['status2'];
              $s1=$status1[$statuse1][0];
              $s2=$status2[$statuse2][0];

                echo "<tr><td>", $row['name'] , "</td><td>" , $row['rollno'] , "</td><td>" , $row['topic'] , "</td><td>" , $s1 , "</td><td>", $row['date1'] , "</td><td>" ,
                 $s2, "</td><td>", $row['date2'] ,"</td><td><form action = 'historyuser.php' method = 'post'>", "<input type = 'hidden' name = 'rollno' value = '", $roll, "'>", "<input type = 'hidden' name = 'name' value = '", $row['name'], "'>", "<input type = 'submit' value = 'History'></form>", "</td></tr>" ;

}
}

if($availability==0)

{
  ?>
 <center>
  <?php

  echo "<br><br><br>";
   echo "No projects are available";
}

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
	<br><br>

  Logged in as :
    <?php
     echo $_SESSION['username'];
     ?>

  </center>
</footer>



</body>
</html>

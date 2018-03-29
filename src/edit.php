<?php
session_start();
if(!isset($_SESSION['username'])) {
        header('Location:index.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="nitc.png">

<style>
body{
    background-color: #f2f2f2;
}
input[type=text], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}
input[type=date], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}
input[type=time], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}
input[type=file], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}
/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}
/* Add a background color and some padding around the form */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>


</head>


<body>
<a href="adminhome.php"><img src="back.png" height="50px" width="50px"></a>

<center>
<h1>NATIONAL INSTITUTE OF TECHNOLOGY CALICUT</h1>
<h2>PHD Student Project Management System</h2></center>
<br><br>

<?php
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
$rollno=mysqli_real_escape_string($conn, $_POST['rollno']);
$sql = "SELECT name,project.rollno,email,department,guide,guidemail,topic,status1,date1,status2,date2
FROM project,mtechstudent
where project.rollno=mtechstudent.rollno
 and project.rollno='$rollno'";
$result= mysqli_query($conn, $sql);
    
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
            $roll=$row['rollno'];
            $statuse1=$row['status1'];
            $statuse2=$row['status2'];
            $date1=$row['date1'];
            $date2=$row['date2'];
  ?>


          <div style="padding: 15px;background-color: #e9dbd8;" >

    <?php
  echo  "<h4>Name:  " . $row["name"]."<br> ". " Roll No :  " . $row["rollno"]. " <br> ". " Project : " . $row["topic"]. "<br> "." Guided By: " . $row["guide"]."<br>" ;
}
}

mysqli_close($conn);
?>
</div>
<br><br>

<form action="editsave.php" method="POST" onsubmit="return confirm('Do you really want to submit the form?');">
<label >Status of Examiner 1</label>
<select  name="status1">

<?php
echo "<option value=".$statuse1.">".$status1[$statuse1][0]."</option>";
for($row=$statuse1+1;$row<32;$row++)
  {
    echo "<option value=".$row.">".$status1[$row][0]."</option>";
  }
?>
</select>
<br>
<label >Modified Date</label>
<input type="date"  name="date1" value= "<?php echo $date1 ?>" required="true">
<br>
<label >Status of Examiner 2</label>
<select  name="status2">

<?php
$statuse2= 1;
echo "<option value=\"\">".$status2[$statuse2][0]."</option>";
for($row=$statuse2;$row<32;$row++)
  {
    echo "<option value=".$row.">".$status2[$row][0]."</option>";
  }
?>
</select>
<br>
<label >Modified Date</label>
<input type="date"  name="date2" value= "<?php echo $date2 ?>" required="true">

<input type="hidden" name="rollno" value="<?php echo $roll ?> ">
<input type="submit" value="Save">
</form>



    <footer style="position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #333;
    color: white;
    text-align: center;"
  <center>

  Logged in as :
    <?php
     echo $_SESSION['username'];
     ?>

  </center>
</footer>

</body>
</html>



</body>
</html>

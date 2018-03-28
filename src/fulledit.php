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

$sql = "SELECT name,project.rollno,email,department,guide,guidemail,topic,guide2,thesisdate,evalutiondate,defensedate
FROM project,mtechstudent
where project.rollno=mtechstudent.rollno
 and project.rollno='$rollno'";
$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
   $roll=$row["rollno"];
   $name=$row["name"];
   $roll=$row["rollno"];
   $email=$row["email"];
   $project=$row["topic"];
   $Guided=$row["guide"];
   $guidemail=$row["guidemail"];
   $topic=$row["topic"];
   $department=$row["department"];
   $guide2=$row["guide2"];
   $tdate=$row["thesisdate"];
   $edate=$row["evalutiondate"];
   $ddate=$row["defensedate"];


}
}

mysqli_close($conn);
?>

<br><br>

<form action="fulleditupdate.php" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to submit the form?');">


   <label >Student Full Name</label>
    <input type="text"  name="name"  required="true" value=<?php  echo $name ?>>
        <label >Student Roll No</label>
    <input type="text"  name="rollno"  required="true" value=<?php  echo $roll ?>>
        <label > Student Email Id</label>
    <input type="text"  name="emailid" required="true" value=<?php  echo $email ?>>

<label for="department">Student Department</label>
<select  name="department">
<option value="<?php  echo $department ?>"><?php  echo $department ?></option>
<option value="Architecture and Planning ">Architecture and Planning </option>
<option value="Chemical Engineering">Chemical Engineering</option>
<option value="Civil Engineering">Civil Engineering </option>
<option value="Computer Science & Engineering">Computer Science Engineering</option>
<option value="Electrical Engineering">Electrical Engineering</option>
<option value="Electronics & Communication Engineering">Electronics Communication Engineering </option>
<option value="Electrical Engineering">Electrical Engineering</option>
<option value="Mechanical Engineering">Mechanical Engineering  </option>
<option value="Mathematics">Mathematics</option>
<option value="Physics">Physics</option>
<br>
</select>
<label >Guide Name</label>
<input type="text"  name="guidance"  required="true" value=<?php  echo $Guided ?>>
<label >Guide Email-Id</label>
<input type="text"  name="guide_emailid"  required="true" pattern="[a-z0-9._%+-]+@nitc.ac.in" value=<?php  echo $guidemail ?>>
<label >Guide Name(optional)</label>
<input type="text"  name="guide2" value=<?php  echo $guide2 ?>>

  <h3 style="color:green">Project Details</h3></center>
  <br>
<label >Project Topic </label>
<input type="text"  name="topic"  required="true" value=<?php  echo $topic ?> >
<input type="hidden" name="roll" value=<?php  echo $roll ?>>

	 <label >Thesis Submitted Date</label>
<input type="date"  name="tdate" value=<?php  echo $tdate ?> >

	 <label >Evaluation Report to Department</label>
<input type="date"  name="edate"  value=<?php  echo $edate?>>

	 <label >Defense Date</label>
<input type="date" name="ddate" value=<?php  echo $ddate ?> >

<input type="submit" value="Update">
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

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
    <a href="logout.php"><img src="123.png" height="50px" width="50px"></a>
<center>
<h1>NATIONAL INSTITUTE OF TECHNOLOGY CALICUT</h1>
<h2>phD Student Project Management System</h2></center>
<br><br>

<center><button onclick="window.location.href='add.php'">Add New Project</button>
<button onclick="window.location.href='notify.php'" style="background-color: orange">Notifications</button></center>
<br><br>

<form action="search.php" method="POST">
<input type="text" name="search" placeholder="Search by RollNo or Name">
<input type="submit" value="search">
</form>
<form action="searchStatus.php" method="POST">
<br>
<select  id = 'status' name="status">
<option value="">Search by Status</option>    
<option value="option1">option1</option>
<option value="option2">option2</option>
<option value="option3">option3</option>
<option value="option4">option4</option>
<option value="option5">option5</option>
<option value="option6">option6</option>
<option value="option7">option7</option>
<option value="option8">option8</option>
<option value="option9">option9</option>
<option value="option10">option10</option>
</select>
<input type="submit" value="search">
<br><br>
</form>


<?php
$roll="";

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
$sql = "SELECT name,project.rollno,email,department,guide,guidemail,topic,status,date
FROM project,mtechstudent 
where project.rollno=mtechstudent.rollno";
$result= mysqli_query($conn, $sql);
$availability=0;
$currenttime=date('Y-m-d');
echo  "<table id = 'records'>"; 
echo "<tr>";
      echo  "<th>Name</th>";
      echo  "<th>Roll No</th>";
      echo  "<th>Project</th>";
      echo  "<th>Guided By</th>";
      echo  "<th>Present Status</th>";
      echo  "<th>Last Modified Date</th>";
      echo  "<th>Edit</th>";
      echo  "<th>History</th>";
      echo "<th>Notification</th>";
  echo "</tr>";    
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
              
             $availability=1;
              $roll=$row['rollno'];

$v=14;
$current=$row['date'];
$new = date('Y-m-d', strtotime("$current +  $v days")); 
        
        echo "<tr><td>", $row['name'] , "</td><td>" , $row['rollno'] , "</td><td>" , $row['topic'] , "</td><td>" , $row['guide'] , "</td><td>", $row['status'] , "</td><td>" , $row['date'], "</td><td><form action = 'edit.php' method = 'post'><input type = 'hidden' name = 'rollno' value = ", $roll, "><input type = 'submit' value = 'Edit'></form>", "</td><td>", "<form action = 'history.php' method = 'post'><input type = 'hidden' name = 'rollno' value = '", $roll, "'><input type = 'hidden' name = 'name' value = '", $row['name'], "'><input type = 'submit' value = 'History'></form>","</td><td>";

      if ($new <= $currenttime) {

   echo "<form action='Notification.php' method='post' >
  <input type='hidden' name='rollno' value= ",$roll ,"> 
  <input type='submit' value='Notification' style='background-color: red'></form>"; 
         }

   echo "</td></tr>" ;

 }}


if($availability==0)
{
   echo "<br><br><br>";
   echo "<center>"."No projects are available"."</center>";
}
                  
mysqli_close($conn);
?> 

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



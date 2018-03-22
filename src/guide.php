<?php
session_start();
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
$sql = "SELECT name,project.rollno,email,department,guide,guidemail,topic,status,date
FROM project,mtechstudent 
where project.rollno=mtechstudent.rollno and guidemail='$name'";
$result= mysqli_query($conn, $sql);
$availability=0;
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
            $roll=$row['rollno'];
             $availability=1;
             
      
echo  "<table id = 'records'>"; 
  echo "<tr>";
      echo  "<th>Name</th>";
      echo  "<th>Roll No</th>";
      echo  "<th>Project</th>";
      echo  "<th>Guided By</th>";
      echo  "<th>Present Status</th>";
      echo  "<th>Last Modified Date</th>";
      echo  "<th>History</th>";
  echo "</tr>";    
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
              
             $availability=1;
              $roll=$row['rollno'];
  ?>       
            <?php
        
        echo "<tr><td>", $row['name'] , "</td><td>" , $row['rollno'] , "</td><td>" , $row['topic'] , "</td><td>" , $row['guide'] , "</td><td>", $row['status'] , "</td><td>" , $row['date'], "</td><td> ,"<form action = 'history.php' method = 'post'><input type = 'hidden' name = 'rollno' value = ", $roll, "><input type = 'submit' value = 'History'></form>", "</td></tr>" ;?>
        ?>


<?php
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
  
  Logged in as :
    <?php
     echo $_SESSION['username'];
     ?>
  
  </center>
</footer>
   
</body>
</html>

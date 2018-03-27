<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="nitc.png">

<style>

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
echo "<h3>".$name."</h3><br>";
echo "<h3>".$roll."</h3><br>";

$sql = "SELECT rollno,status,datemodify
FROM history
where rollno='$roll' ORDER BY datemodify";

$result= mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo  "<table id = 'records'>"; 
    echo "<tr>";
      echo  "<th>Status</th>";
      echo  "<th>Date</th>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result)) 
 {
        echo "<tr><td>", $row['status'] , "</td><td>" , $row['datemodify'] , "</td></tr>";  
 }
 echo "</table>";
}
else
    echo "<p>No history found</p>";
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


